<?php

namespace App\Http\Controllers\Admin;

use App\Chat;
use App\Http\Controllers\API\PushNotifyController;
use App\Http\Requests\Chat\StartGroupRequest;
use App\User;
use App\UsersGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatForumController extends Controller
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function index(Request $request)
    {
        return view('admin.chat-forum.index', [
            'page_title' => 'Спичок форумов',
            'search' => $request->get('search'),
            'items' => Chat::query()->where('group_type', UsersGroup::FORUM)->when($request->get('search'), function (Builder $chat) use ($request) {
                $chat->where('group_title', 'LIKE', "%{$request->get('search')}%");
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function create()
    {
        return view('admin.chat-forum.create', ['page_title' => 'Добавление форума']);
    }

    /**
     * @param StartGroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StartGroupRequest $request)
    {
        $users = [];

        foreach ($request->users as $item) {
            $user = User::find($item);
            if ($user) {
                $users[] = $user->id;
            }
        }

        $chat = Chat::create([
            'group' => 1,
            'group_users' => json_encode($users),
            'group_title' => $request->get('title'),
            'group_type' => $request->type
        ]);

        foreach ($users as $user) {
            UsersGroup::create([
                'chat_id' => $chat->id,
                'user_id' => $user,
                'type' => $request->type
            ]);

            $sendPush = new PushNotifyController();
            $sendPush->sendPush('Создана новая группа!', $user, $request->get('title'));
        }

        return redirect()->route('admin.chat-forum.index')->with('success', 'Консилиум успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function edit($id)
    {
        $chat = Chat::query()->findOrFail($id);
        $users = [];

        foreach (json_decode($chat->group_users) as $item) {
            $user = User::find($item);
            $users[$user->id] = $user->name.' '.$user->last_name;
        }

        $chat->users = $users;

        return view('admin.chat-forum.edit', [
            'page_title' => 'Редактирование форума',
            'chat' => $chat
        ]);
    }

    function key_compare_func($a, $b)
    {
        if ($a === $b) {
            return 0;
        }
        return ($a > $b)? 1:-1;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $chat = Chat::find($id);
        $users_chat = json_decode($chat->group_users);
        $add = array_diff((array)$request->users, $users_chat);
        $delete = array_diff($users_chat, $request->users);

        foreach ($add as $item) {
            $user = User::find($item)->id;
            $users_chat[] = $user;

            UsersGroup::create([
                'chat_id' => $chat->id,
                'user_id' => $user,
                'type' => $chat->group_type
            ]);
        }

        foreach ($delete as $key => $item) {
            $user = User::find($item)->id;

            UsersGroup::where([
                'chat_id' => $chat->id,
                'user_id' => $user
            ])->delete();
        }

        $chat->update([
            'group_users' => json_encode($request->users),
            'group_title' => $request->get('title')
        ]);

        return back()->with('success', 'Сохранено!');
    }
}

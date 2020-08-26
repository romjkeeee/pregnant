<?php

namespace App\Http\Controllers\Admin;

use App\Chat;
use App\ChatMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|mixed
     */

    public function index(Request $request)
    {
        return view('admin.chat.index', [
            'page_title' => 'Спичок чатов',
            'search' => $request->get('search'),
            'items' => Chat::query()->where('group', 0)->with('sender', 'recepient')->when($request->get('search'), function (Builder $chat) use ($request) {
                $chat->whereHas('users', function (Builder $builder) use ($request) {
                    $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%");
                    $builder->orWhere('last_name', 'LIKE', "%{$request->get('search')}%");
                });
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function edit($id)
    {
        return view('admin.chat.edit', [
            'page_title' => 'Просмотр чата',
            'items' => ChatMessage::with('user')->where('chat_id', $id)->get(),
            'chat' => Chat::find($id)
        ]);
    }
}

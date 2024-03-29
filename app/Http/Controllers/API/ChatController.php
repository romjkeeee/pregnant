<?php

namespace App\Http\Controllers\API;

use App\Chat;
use App\ChatMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\AddUserGroupRequest;
use App\Http\Requests\Chat\DeleteChatRequest;
use App\Http\Requests\Chat\GetGroupMessagesRequest;
use App\Http\Requests\Chat\GetGroupRequest;
use App\Http\Requests\Chat\LeaveGroupRequest;
use App\Http\Requests\Chat\ListRequest;
use App\Http\Requests\Chat\SendGroupRequest;
use App\Http\Requests\Chat\SendRequest;
use App\Http\Requests\Chat\StartGroupRequest;
use App\Http\Requests\Chat\StartRequest;
use App\Http\Requests\GetChatPatientsRequest;
use App\Http\Resources\Chat\ChatCollection;
use App\Http\Resources\Chat\MessageCollection;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\ChatResource;
use App\PatientsChat;
use App\User;
use App\UsersGroup;
use http\Client\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Chat
 *
 * APIs for
 */
class ChatController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Start chat
     *
     * @bodyParam recipient_id integer
     *
     */
    public function start(StartRequest $request)
    {
        $chat_id = DB::table('chats')->where([
                'sender_id' => auth()->id(),
                'recipient_id' => $request->recipient_id
            ])->first() ?? false;
        $sendPush = new PushNotifyController();
        $sendPush->sendPush('У вас новый чат',$request->recipient_id,'Pregnancy');
        if ($chat_id) {
            return json_encode($chat_id);
        } else {
            $chat = auth()->user()->senderChats()->create($request->validated());
            PatientsChat::create([
                'doctor_id' => $request->recipient_id,
                'patient_id' => auth()->id(),
            ]);

            return ChatResource::make($chat);
        }
    }

    /**
     * @param GetChatPatientsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getChatPatients(GetChatPatientsRequest $request)
    {
        return \response()->json(
            PatientsChat::with([
                'user' => function ($query) use ($request) {
                    $query->orWhere('doctor_id', '=', $request->doctor_id);
                    $query->orWhere('patient_id', '=', $request->patient_id);
                },
                'user.patient',
                'user.doctor'
            ])->get()
        );
    }

    /**
     * @param StartGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function startGroup(StartGroupRequest $request)
    {
        $users = [];

        foreach (json_decode($request->users) as $item) {
            $user = User::find($item);
            if ($user) {
                $users[] = $item;
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

        return response()->json($chat);
    }

    /**
     * @param SendGroupRequest $request
     * @return MessageResource|\Illuminate\Http\JsonResponse
     */

    public function sendGroup(SendGroupRequest $request)
    {
        $chat = Chat::find($request->chat_id);
        $groupUsers = json_decode($chat->group_users);

        /*if(!array_search(auth()->user()->id, $groupUsers)) {
            return \response()->json([
                'success' => 0,
                'text' => 'Вы не состоите в этом чате!'
            ]);
        }*/

        $message = auth()->user()->messages()->create($request->validated());
        $message->attaches()->createMany($request->all()['attaches'] ?? []);

        $sendPush = new PushNotifyController();
        $body = User::find($message->sender_id);

        foreach ($groupUsers as $user) {
            if ($user != auth()->id()) {
                $sendPush->sendPush($message->text, $user, $chat->title, 1);
            }
        }
        return MessageResource::make(ChatMessage::query()->findOrFail($message->id));
    }

    /**
     * @param AddUserGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function addUserGroup(AddUserGroupRequest $request)
    {
        $chat = Chat::find($request->chat_id);

        $users = (array) json_decode($chat->group_users);

        $users_group = UsersGroup::where([
            'chat_id' => $request->chat_id,
            'user_id' => $request->user_id
        ])->first();

        if ($users_group) {
            return \response()->json([
                'success' => 0,
                'text' => 'Этот пользователь уже в чате!'
            ]);
        }

        $users[] = (integer) $request->user_id;

        $sendPush = new PushNotifyController();
        $body = User::find($request->user_id);

        foreach ($users as $user) {
            if ($user != $request->user_id) {
                $sendPush->sendPush('Приветствуем в чате '. $body->name .' '. $body->last_name .'!', $user, $chat->title);
            }
        }

        $chat->update([
            'group_users' => json_encode($users)
        ]);

        UsersGroup::create([
            'chat_id' => $chat->id,
            'user_id' => (integer) $request->user_id,
            'type' => $chat->group_type
        ]);

        return \response()->json($chat);
    }

    public function groupMessages(GetGroupMessagesRequest $request)
    {
        return MessageCollection::make(ChatMessage::query()
            ->with([
                'user.patient',
                'user.doctor'
            ])
            ->where($request->validated())
            ->when($request->get('search'), function (Builder $builder) use ($request) {
                $builder->where('text', 'LIKE', "%{$request->get('search')}%");
            })->orderByDesc('send_at')
            ->paginate($request->get('perPage') ?? 20));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function getGroups(GetGroupRequest $request)
    {

        /* Маскимально не оптимизировано, нет времени переделывать норм */
        $user_groups = UsersGroup::where([
            'user_id' => auth()->user()->id
        ])
            ->orderByDesc('created_at')
            ->get();

        foreach ($user_groups as $key => $item) {
            $result = Chat::with('lastMessage.attaches')->where([
                'id' => $item->chat_id,
                'group_type' => $request->get('type'),
                ['group_title', 'LIKE', "%{$request->get('search')}%"]
            ])->first();

            if ($result) {
                $item->chat = $result;
            } else {
                unset($user_groups[$key]);
            }
        }

        return \response()->json((array) $user_groups);
    }

    /**
     * @param LeaveGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function leaveGroup(LeaveGroupRequest $request)
    {
        $group = UsersGroup::where([
            'chat_id' => $request->chat_id,
            'user_id' => $request->user_id
        ])->first();
        $chat = Chat::find($request->chat_id);
        $users = json_decode($chat->group_users);
        $search = array_search($request->user_id, $users);

        if($search !== false) {
            unset($users[$search]);
        } else {
            return \response()->json([
                'success' => 0,
                'text' => 'Этого пользователя не было в чате!'
            ]);
        }

        $chat->update([
            'group_users' => json_encode($users)
        ]);
        if ($group != null) {
            $group->delete();
        }
        $group->delete();

        return \response()->json($chat);
    }

    /**
     * Send message
     *
     * @bodyParam text text Укажите либо текст либо изображение
     * @bodyParam attaches text Укажите либо текст либо изображение
     *
     */
    public function send(SendRequest $request): MessageResource
    {
        /** @var ChatMessage $message */
        $message = auth()->user()->messages()->create($request->validated());
        $message->attaches()->createMany($request->all()['attaches'] ?? []);
        $sendPush = new PushNotifyController();
        $chat = Chat::query()->where('id', $request->chat_id)->first();
        $body = User::query()->where('id',$message->sender_id)->first();
        $sendPush->sendPush($message->text,(auth()->id() == $chat->recipient_id ? $chat->sender_id : $chat->recipient_id), $body->name .' '. $body->second_name, 1);
        return MessageResource::make(ChatMessage::query()->findOrFail($message->id));
    }

    /**
     * Send message
     *
     * @bodyParam chat_id integer
     *
     */
    public function messages(ListRequest $request): MessageCollection
    {
        return MessageCollection::make(ChatMessage::query()
            ->with([
                'user.patient',
                'user.doctor'
            ])
            ->where($request->validated())
            ->when($request->get('search'), function (Builder $builder) use ($request) {
                $builder->where('text', 'LIKE', "%{$request->get('search')}%");
            })->orderByDesc('send_at')
            ->paginate($request->get('perPage') ?? 20));
    }

    /**
     * List message
     *
     * @response 200
     *
     */
    public function list(Request $request): ChatCollection
    {
        return ChatCollection::make(Chat::query()
            ->where(function (Builder $builder) {
                $builder->orWhere('sender_id', auth()->id())
                    ->orWhere('recipient_id', auth()->id());
            })->when($request->get('search'), function (Builder $builder) use ($request) {
                $builder->where(function (Builder $query) use ($request) {
                    $query->orWhereHas('sender', function (Builder $user) use ($request) {
                        $user->where(function (Builder $name) use ($request) {
                            $name->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('last_name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('second_name', 'LIKE', "%{$request->get('search')}%");
                        });
                    });
                    $query->orWhereHas('recipient', function (Builder $user) use ($request) {
                        $user->where(function (Builder $name) use ($request) {
                            $name->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('last_name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('second_name', 'LIKE', "%{$request->get('search')}%");
                        });
                    });
                });
            })->orderByDesc('id')->paginate($request->get('perPage') ?? 20));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */

    public function visible(Request $request) {
        foreach ($request->data as $data) {
            ChatMessage::find($data)->update([
                'visible' => 1
            ]);
        }
        return \response(['Ok']);
    }

    /**
     * @param DeleteChatRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function deleteChat(DeleteChatRequest $request)
    {
        $chat = Chat::where('id', $request->chat_id)->delete();

        return \response()->json([
            'success' => 1,
            'text' => 'Чат удален!'
        ]);
    }
}

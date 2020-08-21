<?php

namespace App\Http\Controllers\API;

use App\Chat;
use App\ChatMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ListRequest;
use App\Http\Requests\Chat\SendRequest;
use App\Http\Requests\Chat\StartRequest;
use App\Http\Resources\Chat\ChatCollection;
use App\Http\Resources\Chat\MessageCollection;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\ChatResource;
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
        $sendPush->sendPush('You have new chat',$request->recipient_id);
        if ($chat_id) {
            return json_encode($chat_id);
        } else {
            $chat = auth()->user()->senderChats()->create($request->validated());
            return ChatResource::make($chat);
        }
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
        $body = ChatMessage::query()->where('id',$chat->id)->first();
        $sendPush->sendPush($body->text,$chat->recipient_id);
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

    public function visible(Request $request) {
        foreach ($request->data as $data) {
            ChatMessage::find($data)->update([
                'visible' => 1
            ]);
        }
        return \response(['Ok']);
    }
}

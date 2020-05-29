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
     * @param StartRequest $request
     * @return ChatResource
     */
    public function start(StartRequest $request): ChatResource
    {
        $chat = auth()->user()->senderChats()->create($request->validated());

        return ChatResource::make($chat);
    }

    /**
     * @param SendRequest $request
     * @return MessageResource
     */
    public function send(SendRequest $request): MessageResource
    {
        /** @var ChatMessage $message */
        $message = auth()->user()->messages()->create($request->validated());
        $message->attaches()->createMany($request->all()['attaches'] ?? []);

        return MessageResource::make(ChatMessage::query()->findOrFail($message->id));
    }

    /**
     * @param ListRequest $request
     * @return MessageCollection
     */
    public function messages(ListRequest $request): MessageCollection
    {
        return MessageCollection::make(ChatMessage::query()
            ->where($request->validated())
            ->orderByDesc('send_at')
            ->paginate($request->get('perPage') ?? 20));
    }

    /**
     * @param Request $request
     * @return ChatCollection
     */
    public function list(Request $request): ChatCollection
    {
        return ChatCollection::make(Chat::query()
            ->where(function (Builder $builder) {
                $builder->orWhere('sender_id', auth()->id())
                    ->orWhere('recipient_id', auth()->id());
            })->orderByDesc('id')
            ->paginate($request->get('perPage') ?? 20));
    }
}

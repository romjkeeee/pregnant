<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'sender'      => [
                'data' => $this->sender,
                'user' => $this->info_sender
            ],
            'recipient'   => [
                'data' => $this->recipient,
                'user' => $this->info_recipient
            ],
            'lastMessage' => MessageResource::make($this->lastMessage)
        ];
    }
}

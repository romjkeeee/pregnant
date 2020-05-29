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
            'sender'      => $this->sender,
            'recipient'   => $this->recipient,
            'lastMessage' => MessageResource::make($this->lastMessage)
        ];
    }
}

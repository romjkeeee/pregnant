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
                'user' => $this->info_sender_patient ?? $this->info_sender_doctor
            ],
            'recipient'   => [
                'data' => $this->recipient,
                'user' => $this->info_recipient_patient ?? $this->info_recipient_doctor
            ],
            'lastMessage' => MessageResource::make($this->lastMessage)
        ];
    }
}

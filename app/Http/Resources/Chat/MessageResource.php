<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'id'       => $this->id,
            'text'     => $this->text,
            'send_at'  => $this->send_at ? $this->send_at->format(config('app.datetime_format')) : null,
            'sender'   => $this->sender,
            'attaches' => AttachResource::collection($this->attaches)
        ];
    }
}

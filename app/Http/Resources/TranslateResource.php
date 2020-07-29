<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TranslateResource extends JsonResource
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
            $this->lang_id->code ?? null => [
                'id'    => $this->id,
                'key'   => $this->key,
                'text' => $this->translate->text ?? null,
            ]
        ];
    }
}

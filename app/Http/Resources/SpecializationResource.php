<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializationResource extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->translate->name ?? null,
            'description'  => $this->translate->description ?? null,
            'photo' => $this->photo ? asset($this->photo) : null,
        ];
    }
}

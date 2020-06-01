<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\SpecializationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecializationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'  => SpecializationResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

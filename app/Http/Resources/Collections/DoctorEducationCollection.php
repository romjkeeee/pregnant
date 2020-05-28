<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\DoctorEducationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DoctorEducationCollection extends ResourceCollection
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
            'data'  => DoctorEducationResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\RegionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegionCollection extends ResourceCollection
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
            'data'  => RegionResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

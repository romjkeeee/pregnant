<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\TranslateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TranslateCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        /*return json_encode($this->collection);*/
        return [
            'data'  => TranslateResource::collection($this->collection),
        ];
    }
}

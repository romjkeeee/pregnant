<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ArticleCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCategoryCollection extends ResourceCollection
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
            'data'  => ArticleCategoryResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

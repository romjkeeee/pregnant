<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleCategoryResource extends JsonResource
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
            'id'         => $this->id,
            'title'      => $this->translate->title ?? null,
            'created_at' => $this->created_at ? $this->created_at->format(config('app.datetime_format')) : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format(config('app.datetime_format')) : null,
        ];
    }
}

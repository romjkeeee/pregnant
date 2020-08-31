<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'text'       => $this->translate->text ?? null,
            'source'       => $this->source ?? null,
            'image'      => $this->image ? asset($this->image) : null,
            'preview'    => $this->preview ? asset($this->preview) : null,
            'week'    => $this->week ? asset($this->week) : null,
            'created_at' => $this->created_at ? $this->created_at->format(config('app.datetime_format')) : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format(config('app.datetime_format')) : null,
            'category'   => ArticleCategoryResource::make($this->category),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return collect(parent::toArray($request))->except(['tasks'])->toArray() + [
                'name'  => $this->translate->name ?? null,
                'tasks' => CheckListTaskResource::collection($this->tasks)
            ];
    }
}

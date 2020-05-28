<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorEducationResource extends JsonResource
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
            'id'          => $this->id,
            'doctor_id'   => $this->doctor_id,
            'title'       => $this->translate->title ?? null,
            'description' => $this->translate->description ?? null,
            'created_at'  => $this->created_at ? $this->created_at->format(config('app.datetime_format')) : null,
            'updated_at'  => $this->updated_at ? $this->updated_at->format(config('app.datetime_format')) : null,
        ];
    }
}

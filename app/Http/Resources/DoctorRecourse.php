<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorRecourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return collect(parent::toArray($request))
            ->except(['educations', 'clinics'])
            ->merge([
                'clinic'     => $this->clinics->first(),
                'educations' => DoctorEducationResource::make($this->educations)
            ])->toArray();
    }
}

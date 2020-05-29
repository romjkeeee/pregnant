<?php

namespace App\Http\Resources;

use App\Http\Resources\Collections\DoctorEducationCollection;
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
                'educations' => DoctorEducationCollection::make($this->educations)
            ])->toArray();
    }
}

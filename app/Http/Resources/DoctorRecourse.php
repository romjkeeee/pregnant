<?php

namespace App\Http\Resources;

use App\Clinic;
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
        /** @var Clinic $clinic */
        $clinic = $this->clinics->first();
        if ($clinic) {
            $clinic->addHidden(['schedules']);
        }

        return collect(parent::toArray($request))
            ->except('clinics')
            ->merge([
                'clinic'    => $clinic,
                'schedules' => $this->clinics->first()->schedules ?? [],
            ])->toArray();
    }
}

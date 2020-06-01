<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'name'    => $this->translate->name ?? null,
            'text'    => $this->translate->text ?? null,
            'address' => $this->translate->address ?? null,
            'city'    => CityResource::make($this->city),
            'region'  => RegionResource::make($this->region)
        ]);
    }
}

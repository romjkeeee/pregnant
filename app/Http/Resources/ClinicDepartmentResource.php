<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicDepartmentResource extends JsonResource
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
            'name'     => $this->translate->name ?? null,
            'street'   => $this->translate->street ?? null,
            'building' => $this->translate->building ?? null,
        ]);
    }
}

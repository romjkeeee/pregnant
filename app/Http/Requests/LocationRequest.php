<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'region_id' => ['required', 'exists:regions,id'],
            'city_id'   => ['required', 'exists:cities,id'],
            'street'    => ['required', 'min:2', 'max:128'],
            'building'  => ['required', 'min:1', 'max:64'],
            'apartment' => ['nullable', 'min:1', 'max:64'],
        ];
    }
}

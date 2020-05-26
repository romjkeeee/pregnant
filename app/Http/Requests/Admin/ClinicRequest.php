<?php

namespace App\Http\Requests\Admin;

use App\Clinic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'region_id' => ['required', 'exists:regions,id'],
            'city_id'   => ['required', 'exists:cities,id'],
            'type'      => ['required', Rule::in(Clinic::PRIVATE, Clinic::STATE)],
            'phone'     => ['required', 'phone:RU'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'name'      => ['required', 'min:2', 'max:128'],
            'text'      => ['nullable', 'min:2', 'max:65000'],
            'address'   => ['required', 'min:2', 'max:192'],
            'lng'       => ['required', 'min:3', 'max:32'],
            'lat'       => ['required', 'min:3', 'max:32'],
        ];
    }

}

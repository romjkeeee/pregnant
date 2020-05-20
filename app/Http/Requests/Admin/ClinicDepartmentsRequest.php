<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicDepartmentsRequest extends FormRequest
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
            'clinic_id' => ['required', 'exists:clinics,id'],
            'street'    => ['required', 'string'],
            'building'  => ['required', 'string'],
            'name'      => [
                'required',
                Rule::unique('clinic_departments', 'name')
                    ->where('clinic_id', $this->get('clinic_id'))
                    ->ignore($this->route()->parameter('department'))
            ],
        ];
    }
}

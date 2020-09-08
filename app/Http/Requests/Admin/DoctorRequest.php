<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
            'user_id'           => ['required', Rule::unique('doctors', 'user_id')->ignore($this->route()->parameter('doctor'))],
            'clinics'           => ['required', 'array'],
            'clinics.*'         => ['required', 'exists:clinics,id'],
            'specializations'   => ['required', 'array'],
            'specializations.*' => ['required', 'exists:specializations,id'],
            'image'             => ['image'],
            'experience' => ['min:1']
        ];
    }

}

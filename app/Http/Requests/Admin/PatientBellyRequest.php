<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PatientBellyRequest extends FormRequest
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
            'patient_id'            => ['required', 'exists:patients,id'],
            'uterine_fundus_height' => ['required', 'numeric', 'between:1,500'],
            'girth_abdomen'         => ['required', 'numeric', 'between:1,500'],
            'date'                  => ['required', 'date_format:Y-m-d'],
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    public function rules()
    {
        return [
            'uterine_fundus_height' => 'required|numeric|max:500',
            'girth_abdomen'         => 'required|numeric|max:500',
            'date'                  => [
                'required',
                'date',
                'before:now',
                Rule::unique('patient_bellies', 'date')
                    ->where('patient_id', auth()->user()->patient->id)
            ]
        ];
    }
}

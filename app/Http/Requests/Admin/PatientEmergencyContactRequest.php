<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientEmergencyContactRequest extends FormRequest
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
            'patient_id' => ['required', 'exists:patients,id'],
            'name'       => [
                'required',
                'string',
                Rule::unique('emergency_contacts', 'name')
                    ->where('patient_id', $this->get('patient_id'))
                    ->ignore($this->route()->parameter('emergency_contact'))
            ],
            'phone'      => [
                'required',
                'phone:RU',
                Rule::unique('emergency_contacts', 'phone')
                    ->where('patient_id', $this->get('patient_id'))
                    ->ignore($this->route()->parameter('emergency_contact'))
            ],
        ];
    }

}

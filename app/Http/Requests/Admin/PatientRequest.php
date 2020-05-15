<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->merge(['pregnant' => $this->get('pregnant') ? 1 : 0]);

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
            'user_id'       => ['required', Rule::unique('patients', 'user_id')->ignore($this->route()->parameter('patient'))],
            'clinic_id'     => 'required|exists:clinics,id',
            'doctor_id'     => 'required|exists:doctors,id',
            'date_of_birth' => 'required|date|before:now',
            'pregnant'      => 'required|in:0,1',
        ];
    }

}

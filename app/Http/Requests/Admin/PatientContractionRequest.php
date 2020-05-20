<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PatientContractionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->merge(['start' => $this->get('start') ? Carbon::createFromFormat('Y-m-d\TH:i', $this->get('start'))->format('Y-m-d H:i:s') : null]);

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
            'start'      => ['required', 'date_format:Y-m-d H:i:s'],
            'duration'   => ['required', 'date_format:H:i'],
            'interval'   => ['required', 'date_format:H:i'],
        ];
    }

}

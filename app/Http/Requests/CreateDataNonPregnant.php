<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDataNonPregnant extends FormRequest
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
            'start_last_menstruation'        => 'required|date',
            'duration_menstruation'       => 'required|integer',
            'duration_cycle'       => 'required|integer',
        ];
    }
}

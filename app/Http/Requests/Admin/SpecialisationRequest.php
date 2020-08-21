<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SpecialisationRequest extends FormRequest
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
            'translate'           => ['required', 'array'],
            'translate.*.lang_id' => ['required', 'exists:langs,id'],
            'translate.*.name'    => ['required', 'max:192'],
            'translate.*.description'    => ['required', 'max:192'],
            'photo'               => ['image'],
        ];
    }
}

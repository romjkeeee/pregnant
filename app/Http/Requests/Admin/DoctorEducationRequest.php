<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorEducationRequest extends FormRequest
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
            'doctor_id'               => ['required', 'exists:doctors,id'],
            'translate'               => ['required', 'array'],
            'translate.*.lang_id'     => ['required', 'exists:langs,id'],
            'translate.*.title'       => ['required', 'string'],
            'translate.*.description' => ['required', 'between:3,60000'],
            'image'                   => ['image'],
        ];
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return collect(parent::validated())->except(['translate'])->toArray();
    }
}

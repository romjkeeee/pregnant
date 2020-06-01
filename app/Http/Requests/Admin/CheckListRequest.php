<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckListRequest extends FormRequest
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
            'image'               => [
                Rule::requiredIf(function () {
                    return $this->isMethod('post');
                }),
                'nullable',
                'image',
                'max:2048'
            ],
            'translate'           => ['required', 'array'],
            'translate.*.lang_id' => ['required', 'exists:langs,id'],
            'translate.*.name'    => ['required', 'max:192'],
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

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TranslateRequest extends FormRequest
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
            'key'                 => ['required', Rule::unique('translates', 'key')->ignore($this->route()->parameter('translate'))],
            'translate'           => ['required', 'array'],
            'translate.*.lang_id' => ['required', 'exists:langs,id'],
            'translate.*.text'    => ['required', 'max:60000'],
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

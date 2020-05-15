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
            'name'  => ['required', Rule::unique('check_lists', 'name')->ignore($this->route()->parameter('check_list'))],
            'image' => [
                Rule::requiredIf(function () {
                    return $this->isMethod('post');
                }),
                'nullable',
                'image',
                'max:2048'
            ]
        ];
    }

}

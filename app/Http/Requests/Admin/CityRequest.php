<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
            'region_id' => ['required', 'exists:regions,id'],
            'name'      => [
                'required',
                'min:2',
                'max:128',
                Rule::unique('cities', 'name')
                    ->where('region_id', $this->get('region_id'))
                    ->ignore($this->route()->parameter('city'))
            ],
        ];
    }
}
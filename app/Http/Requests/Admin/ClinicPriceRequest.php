<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicPriceRequest extends FormRequest
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
            'clinic_id' => ['required', 'exists:clinics,id'],
            'price'     => ['required', 'integer'],
            'name'      => [
                'required',
                'min:2',
                'max:128',
                Rule::unique('clinic_prices', 'name')
                    ->where('clinic_id', $this->get('clinic_id'))
                    ->ignore($this->route()->parameter('price'))
            ]
        ];
    }
}

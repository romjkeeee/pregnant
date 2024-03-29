<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameUpdateRequest extends FormRequest
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
            'name'          => ['min:2', 'max:128'],
            'last_name'     => ['min:2', 'max:128'],
            'second_name'   => ['min:2', 'max:128'],
        ];
    }
}

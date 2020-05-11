<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required|min:2|max:192',
            'email'    => 'required|email|max:192|unique:users,email',
            'password' => 'required|min:6|max:24',
        ];
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return array_merge(parent::validated(), ['password' => bcrypt($this->get('password'))]);
    }
}

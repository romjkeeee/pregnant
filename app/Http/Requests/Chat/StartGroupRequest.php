<?php

namespace App\Http\Requests\Chat;

use App\UsersGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartGroupRequest extends FormRequest
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
     * @return array
     */

    private function __roles(): array
    {
        return [UsersGroup::COUNCIL, UsersGroup::FORUM];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users' => 'required',
            'title' => 'required',
            'type' => [
                'required',
                Rule::in($this->__roles())
            ]
        ];
    }
}

<?php

namespace App\Http\Requests\Chat;

use App\UsersGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetGroupRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'type' => Rule::in($this->__roles())
        ];
    }
}

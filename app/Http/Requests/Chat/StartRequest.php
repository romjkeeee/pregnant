<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartRequest extends FormRequest
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
            'recipient_id' => [
                'required',
                'exists:users,id',
                Rule::notIn([auth()->id()]),
                Rule::unique('chats', 'recipient_id')->where('sender_id', auth()->id())
            ]
        ];
    }
}

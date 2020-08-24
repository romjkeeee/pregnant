<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendGroupRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private $chat_id;

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
            'chat_id' => [
                'required',
                'exists:chats,id'
            ],
            'text' => [
                Rule::requiredIf(function () {
                    return empty($this->all()['attaches'] ?? []);
                }),
                'nullable',
                'min:1',
                'max:192'
            ],
            'attaches' => [
                Rule::requiredIf(function () {
                    return !$this->get('text');
                }),
                'nullable',
                'array'
            ],
            'attaches.*.path' => ['required|image|max:5048']
        ];
    }
}

<?php

namespace App\Http\Requests\Chat;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListRequest extends FormRequest
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
            'chat_id' => [
                'required',
                Rule::exists('chats', 'id')->where(function (Builder $query) {
                    $query->orWhere('sender_id', auth()->id())->orWhere('recipient_id', auth()->id());
                })
            ],
        ];
    }
}

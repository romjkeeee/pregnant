<?php

namespace App\Http\Requests\Chat;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendRequest extends FormRequest
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
     * @return array|string[]
     */
    public function messages(): array
    {
        return parent::messages() + [
                'text.required'     => 'Укажите либо текст либо изображение',
                'attaches.required' => 'Укажите либо текст либо изображение',
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'chat_id'         => [
                'required',
                Rule::exists('chats', 'id')->where(function (Builder $query) {
                    $query->orWhere('sender_id', auth()->id())->orWhere('recipient_id', auth()->id());
                })
            ],
            'text'            => [
                Rule::requiredIf(function () {
                    return empty($this->all()['attaches'] ?? []);
                }),
                'nullable',
                'min:1',
                'max:192'
            ],
            'attaches'        => [
                Rule::requiredIf(function () {
                    return !$this->get('text');
                }),
                'nullable',
                'array'
            ],
            'attaches.*.path' => ['required', 'image', 'max:10000']
        ];
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return collect(parent::validated())->except(['attaches'])->toArray();
    }
}

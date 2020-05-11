<?php

namespace App\Http\Requests;

use App\UserSmsCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserVerifyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        UserSmsCode::query()->where('created_at', '<', now()->subHour(15))->delete();

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
            'code' => ['required', 'exists:user_sms_codes,code']
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\AuthCheck;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return Builder|Model|User|object|null
     */
    private function __user()
    {
        return User::query()->where('email', $this->get('email'))->first();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => ['required'],
            'password' => ['required', new AuthCheck($this->__user())]
        ];
    }
}

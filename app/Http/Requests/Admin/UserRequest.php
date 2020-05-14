<?php

namespace App\Http\Requests\Admin;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * @var User|null $user
     */
    private $user;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->user = User::query()->find($this->route()->parameter('user'));
        $this->merge(['verified' => $this->get('verified') ? 1 : 0]);

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
            'name'      => 'required|min:2|max:64',
            'city_id'   => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
            'street'    => 'required|min:2|max:64',
            'building'  => 'required|min:1|max:64',
            'apartment' => 'nullable|min:1|max:64',
            'role'      => ['required', Rule::in(User::DOCTOR, User::PATIENT)],
            'verified'  => 'required|in:0,1',
            'email'     => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id ?? null)],
            'phone'     => ['required', 'phone:RU', Rule::unique('users', 'phone')->ignore($this->user->id ?? null)],
            'password'  => ['nullable', 'min:6', 'max:24']
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    private function __roles(): array
    {
        return [User::DOCTOR, User::PATIENT];
    }

    /**
     * @return array
     */
    private function __user(): array
    {
        return [
            'image'                 => 'nullable|image|max:2048',
            'name'                  => 'required|min:2|max:192',
            'last_name'             => 'required|min:2|max:192',
            'second_name'           => 'required|min:2|max:192',
            'phone'                 => 'required|phone:AUTO,RU,UA|unique:users,phone',
            'role'                  => ['required', Rule::in($this->__roles())],
            'email'                 => 'required|email|max:192|unique:users,email',
            'region_id'             => 'required|exists:regions,id',
            'city_id'               => 'required|exists:cities,id',
            'street'                => 'required|min:2|max:128',
            'building'              => 'required|min:1|max:32',
            'apartment'             => 'nullable|min:1|max:32',
            'password'              => 'required|min:6|max:24|confirmed',
            'password_confirmation' => ['required'],
            'lang_id'               => 'required|exists:langs,id'
        ];
    }


    /**
     * @return array|string[]
     */
    private function __doctor(): array
    {
        return [
            'clinics'           => 'required|array',
            'clinics.*'         => 'required|exists:clinics,id',
            'specialisations'   => 'required|array',
            'specialisations.*' => 'required|exists:specializations,id',
        ];
    }

    /**
     * @return array|string[]
     */
    private function __patient(): array
    {
        return [
            'clinic_id'     => 'nullable|exists:clinics,id',
            'doctor_id'     => 'nullable|exists:doctors,id',
            'date_of_birth' => 'required|date|before:now',
            'pregnant'      => 'required|in:0,1',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        switch ($this->get('role')) {
            case User::DOCTOR:
                return $this->__user() + $this->__doctor();
            case User::PATIENT:
                return $this->__user() + $this->__patient();
            default:
                return $this->__user();
        }
    }

    /**
     * @return array
     */
    public function validatedUser(): array
    {
        return collect($this->only(array_keys($this->__user())))->except(['password_confirmation'])->toArray();
    }

    /**
     * @return array
     */
    public function validatedDoctor(): array
    {
        return $this->only(['specialization']);
    }

    /**
     * @return array
     */
    public function validatedClinics(): array
    {
        return $this->get('clinics') ?? [];
    }

    /**
     * @return array
     */
    public function validatedSpecialisations(): array
    {
        return $this->get('specialisations') ?? [];
    }

    /**
     * @return array
     */
    public function validatedPatient(): array
    {
        return $this->only(array_keys($this->__patient()));
    }
}

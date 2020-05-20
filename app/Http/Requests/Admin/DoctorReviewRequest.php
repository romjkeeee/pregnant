<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorReviewRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'user_id'   => ['required', 'exists:users,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'rate'      => ['required', 'numeric', 'between:1,5'],
            'text'      => ['required', 'min:3', 'max:192'],
        ];
    }
}

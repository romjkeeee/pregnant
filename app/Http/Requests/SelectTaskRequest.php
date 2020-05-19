<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SelectTaskRequest extends FormRequest
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
            'task_id' => [
                'required',
                'exists:check_list_tasks,id',
                Rule::unique('patient_tasks', 'task_id')
                    ->where('patient_id', auth()->user()->patient->id ?? null)
            ]
        ];
    }
}

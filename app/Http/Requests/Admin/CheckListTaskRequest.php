<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckListTaskRequest extends FormRequest
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
            'list_id' => ['required', 'exists:check_lists,id'],
            'name'    => ['required', Rule::unique('check_list_tasks', 'name')->ignore($this->route()->parameter('check_list_task'))],
        ];
    }

}

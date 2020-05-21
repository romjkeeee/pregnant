<?php

namespace App\Http\Requests\Admin;

use App\Rules\ClassExist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{
    /**
     * @var $model Model
     */
    public $model;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->model = $this->get('model');

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
            'id'    => ['required', 'numeric'],
            'model' => ['required', new ClassExist($this->get('id'))],
        ];
    }
}

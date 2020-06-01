<?php

namespace App\Http\Requests\Admin;

use App\Clinic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicRequest extends FormRequest
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
            'region_id' => ['required', 'exists:regions,id'],
            'city_id'   => ['required', 'exists:cities,id'],
            'type'      => ['required', Rule::in(Clinic::PRIVATE, Clinic::STATE)],
            'phone'     => ['required', 'phone:RU'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'lng'       => ['required', 'min:3', 'max:32'],
            'lat'       => ['required', 'min:3', 'max:32'],

            'translate'           => ['required', 'array'],
            'translate.*.lang_id' => ['required', 'exists:langs,id'],
            'translate.*.name'    => ['required', 'max:192'],
            'translate.*.address' => ['required', 'max:192'],
            'translate.*.text'    => ['required', 'between:3,60000'],
        ];
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return collect(parent::validated())->except(['translate'])->toArray();
    }
}

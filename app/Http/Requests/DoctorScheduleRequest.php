<?php

namespace App\Http\Requests;

use App\Rules\ClinicScheduleRule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorScheduleRequest extends FormRequest
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
    private function __rules(): array
    {
        $rules = ['form' => [new ClinicScheduleRule]];
        collect(trans('date.days'))->each(function ($name, $day) use (&$rules) {
            $rules += [
                "form.{$day}.doctor_id" => ['nullable', 'exists:doctors,id'],
                "form.{$day}.day"       => ['nullable', "in:$day"],
                "form.{$day}.start"     => ["required_with:form.{$day}.end", 'nullable', 'date_format:H:i'],
                "form.{$day}.end"       => ["required_with:form.{$day}.start", 'nullable', 'date_format:H:i', "after:form.{$day}.start"],
            ];
        });

        return $rules;
    }

    /**
     * @return array
     */
    private function __create(): array
    {
        return $this->__rules() + ['doctor_id' => ['required', 'exists:doctors,id', 'unique:doctors_schedules,doctor_id']];
    }

    /**
     * @return array
     */
    private function __edit()
    {
        return $this->__rules();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->isMethod('post') ? $this->__create() : $this->__edit();
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return collect($this->get('form'))
            ->filter(function (array $item) {
                return $item['start'] && $item['end'];
            })->toArray();
    }
}

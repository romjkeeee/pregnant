<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClinicScheduleRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !!collect($value)->filter(function (array $item) {
            return $item['start'] && $item['end'];
        })->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Input min 1 schedule times';
    }
}

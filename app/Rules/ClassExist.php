<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class ClassExist implements Rule
{
    /**
     * @var null|integer
     */
    private $id;

    /**
     * Create a new rule instance.
     *
     * @param int|null $id
     */
    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param Model $class
     * @return bool
     */
    public function passes($attribute, $class)
    {
        return class_exists($class) && $class::query()->find($this->id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Запись не найдена';
    }
}

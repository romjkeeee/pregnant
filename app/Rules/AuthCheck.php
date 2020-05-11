<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AuthCheck implements Rule
{
    /**
     * @var User|null
     */
    private $user;

    /**
     * Create a new rule instance.
     *
     * @param User|null $user
     */
    public function __construct(User $user = null)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    private function __exist(): bool
    {
        return !!$this->user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (!$this->__exist()) {
            return true;
        }

        return Hash::check($value, $this->user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Не удалось авторизоваться по указанным данным';
    }
}

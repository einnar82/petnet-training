<?php

namespace App\Rules\API;

use App\Models\PasswordReset;
use Illuminate\Contracts\Validation\Rule;

class CheckTokenIfExistRule implements Rule
{

    public $email;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return PasswordReset::haveTokens($value, $this->email);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The token doesn't exist within the user";
    }
}

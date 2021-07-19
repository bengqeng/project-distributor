<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class EmailEditMustNotRegistered implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
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
        $hisEmail = User::where('email', '=', $value)->where('uuid', $this->uuid)->get()->count() > 0 ;
        if ($hisEmail)
        {
            return true;
        }

        return User::where('email', '=', $value)
            ->where('status_register', '!=', 'rejected')
            ->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email telah digunakan, silahkan pilih email lain.';
    }
}

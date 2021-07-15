<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class IsAccountOnProcess implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $email      = User::where('banned', "=", false)
                        ->where('status_register', "=", "hold")
                        ->where(function($q) use ($value) {
                            $q  ->Where('username', $value)
                                ->orwhere('email', $value)
                                ->orWhere('phone_number', $value);
                        })
                        ->get();

        return $email->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Akun anda masih dalam proses, silahkan hubungi admin anda';
    }
}

<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class IsAccountBanned implements Rule
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
        $email      = User::where('banned', "=", true)
                        ->where(function($q) use ($value) {
                            $q  ->Where('username', $value)
                                ->orwhere('email', $value);
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
        return 'Banned, silahkan hubungin administrator anda';
    }
}

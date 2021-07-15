<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class IsAccountLoginStatusRejected implements Rule
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
        $user       = User::where('banned', "=", false)
                        ->where(function($q) use ($value) {
                            $q  ->Where('username', $value)
                                ->orwhere('email', $value)
                                ->orWhere('phone_number', $value);
                        })
                        ->get()
                        ->pluck("status_register")->toArray();

        return in_array("approved", $user);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Maaf akun anda tidak lolos aktivasi, silahkan hubungi administrator kami atau daftar kembali.';
    }
}

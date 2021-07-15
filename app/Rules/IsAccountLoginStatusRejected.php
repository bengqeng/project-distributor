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
        $afterTrim          = str_replace(" ", "", $value);
        $isPhone            = substr($afterTrim, 0, 3);
        $queryPhoneNumber   = "";

        if( (strpos($isPhone, '+62') !== false ) ){
            $queryPhoneNumber = $afterTrim;
        }
        elseif( (strpos($isPhone, '62') !== false ) ) {
            $queryPhoneNumber = "+" . $afterTrim;
        }
        elseif((strpos($isPhone, '08') !== false ) ) {
            $queryPhoneNumber = substr_replace($afterTrim, "+62", 0, 1);
        }
        elseif((strpos($isPhone, '8') !== false )){
            $queryPhoneNumber = "+62" . $afterTrim;
        }

        if($queryPhoneNumber != ""){
            $user       = User::where('banned', "=", false)
                        ->where(function($q) use ($queryPhoneNumber) {
                            $q  ->whereRaw("REPLACE(phone_number, ' ' ,'') = ?", $queryPhoneNumber);
                        })
                        ->get()
                        ->pluck("status_register")->toArray();
        }
        else{
            $user       = User::where('banned', "=", false)
                        ->where(function($q) use ($value) {
                            $q  ->Where('username', $value)
                                ->orwhere('email', $value)
                                ->orWhere('phone_number', $value);
                        })
                        ->get()
                        ->pluck("status_register")->toArray();
        }

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

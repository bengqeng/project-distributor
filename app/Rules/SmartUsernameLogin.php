<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class SmartUsernameLogin implements Rule
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
        $email      = User::where('email', $value)
                        ->orWhere('username', $value)
                        ->orWhere('phone_number', $value)
                        ->get();
        if($email->count() > 0){ return true; }

        $afterTrim  = str_replace(" ", "", $value);
        $isPhone    = substr($afterTrim, 0, 3);
        $queryPhoneNumber = "";

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
            return User::whereRaw("REPLACE(phone_number, ' ' ,'') = ?", $queryPhoneNumber)->get()->count() > 0;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email/Akun Id/No HP tidak ditemukan';
    }
}

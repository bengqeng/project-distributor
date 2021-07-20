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
            $email      = User::where('banned', "=", true)
                        ->where(function($q) use ($queryPhoneNumber) {
                            $q->whereRaw("REPLACE(phone_number, ' ' ,'') = ?", $queryPhoneNumber);
                        })
                        ->get();
        }
        else {
            $email      = User::where('banned', "=", true)
                        ->where(function($q) use ($value) {
                            $q  ->Where('username', $value)
                                ->orwhere('email', $value);
                        })
                        ->get();
        }

        return $email->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Diblokir, silahkan hubungin administrator anda';
    }
}

<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class PhoneNumberEditMustUnique implements Rule
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

        return User::whereNotIn('uuid', [$this->uuid])
            ->where(function($q) use ($queryPhoneNumber) {
                $q->whereRaw("REPLACE(phone_number, ' ' ,'') = ?", $queryPhoneNumber);
            })
            ->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nomor Telephone sudah ada yang menggunakan.';
    }
}

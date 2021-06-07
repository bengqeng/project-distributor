<?php

namespace App\Http\Requests;
Use Request;

use Illuminate\Foundation\Http\FormRequest;
Use App\Rules\EmailMustUnique;
Use App\Rules\ReferralMustExist;
Use App\Rules\BirthDay;
use App\Rules\ReferralCaseSensitive;

class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model'         => ['required', 'in:outlet,friends'],
            'email'         => [new EmailMustUnique(), 'required'],
            'gender'        => ['required', 'in:laki-laki,perempuan'],
            'birthday'      => ['required','date', new BirthDay()],
            'full_name'     => 'required|max:255',
            'birth_place'   => 'required',
            'phone_number'  => 'required',
            'referral'      => [new ReferralMustExist(), new ReferralCaseSensitive()],
            'address'       => 'required',
            'city'          => 'required',
            'provinsi'      => 'required',
            'kecamatan'     => 'required',
            'kelurahan'     => 'required',
            'gender'        => 'required',
            'password'      => ['required'],
        ];
    }
}

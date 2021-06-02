<?php

namespace App\Http\Requests;
Use Request;

use Illuminate\Foundation\Http\FormRequest;
Use App\Rules\EmailMustUnique;

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
            // 'model'         => 'required',
            'email'         => ['required', new EmailMustUnique()],
            'gender'        => 'required',
            'birthday'      => 'required|date',
            'full_name'     => 'required|max:255',
            'birth_place'   => 'required',
            'phone_number'  => 'required',
            // 'address'       => 'required',
            // 'city'          => 'required',
            // 'provinsi'      => 'required',
            // 'kecamatan'     => 'required',
            // 'gender'        => 'required',
            'password'      => ['required'],
            // 'kelurahan'      => ['required']
        ];
    }
}

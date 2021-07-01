<?php

namespace App\Http\Requests;

use App\Rules\AccountMustRegisterAsMember;
use App\Rules\MustMatchOldPassword;
use App\Rules\UuidMustExist;
use Illuminate\Foundation\Http\FormRequest;

class MemberPostEditPasswordRequest extends FormRequest
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
        // dd($this->request);
        return [
            'uuid'                      => ['required', new UuidMustExist(), new AccountMustRegisterAsMember()],
            'old_password'              => ['required', new MustMatchOldPassword($this->uuid)],
            'new_password'              => ['required', 'confirmed'],
            'new_password_confirmation' => ['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'uuid.required' => 'uuid tidak ditemukan',
            'old_password.required'  => 'Password lama harus di inputkan',
            'new_password.required'  => 'Password baru harus di inputkan',
            'new_password.confirmed' => 'Konfirmasi password tidak sesuai dengan password baru',
            'new_password_confirmation.required'  => 'Password konfirmasi harus di inputkan',
        ];
    }
}

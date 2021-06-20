<?php

namespace App\Http\Requests;

use App\Rules\AccountMustRegisterAsMember;
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
        return [
            'uuid'                  => ['required', new UuidMustExist(), new AccountMustRegisterAsMember()],
            'old_password'          => ['required'],
            'new_password'          => ['required', 'confirmed'],
            'new_password_confirmation' => ['required']
        ];
    }
}

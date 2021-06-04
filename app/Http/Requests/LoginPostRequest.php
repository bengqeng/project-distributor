<?php

namespace App\Http\Requests;

use App\Rules\SmartUsernameLogin;
use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'smart_user_login' => ['required', new SmartUsernameLogin()],
            'password' => ['required']
        ];
    }
}

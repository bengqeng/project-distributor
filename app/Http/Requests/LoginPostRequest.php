<?php

namespace App\Http\Requests;

use App\Rules\IsAccountBanned;
use App\Rules\IsAccountLoginStatusRejected;
use App\Rules\IsAccountOnProcess;
use App\Rules\SmartUsernameLogin;
use GuzzleHttp\Psr7\Request;
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
            'smart_user_login'  => ['required', new SmartUsernameLogin(), new IsAccountBanned(), new IsAccountOnProcess(), new IsAccountLoginStatusRejected()],
            'password'          => ['required']
        ];
    }
}

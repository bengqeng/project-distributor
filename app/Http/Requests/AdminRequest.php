<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
          'title' => 'required|max:150|min:5',
          'description' => 'required|max:150|min:5',
          'category' => 'required',
          'master_images' => 'required|image|mimes:jpeg,png,jpg|max:300',
          'images' => 'required',
          'author' => 'required|max:50|min:3',
          'body_article' => 'required|min:5',
        ];
    }
}

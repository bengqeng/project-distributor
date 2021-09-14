<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'body_article' => 'required|min:5|max:10000',
        ];


    }
    public function messages()
    {
        return [
            'body_article.max'    => 'Maksimal 5000 karakter',
            'body_article.min'    => 'Minimal 5 karakter',
        ];
    }
}

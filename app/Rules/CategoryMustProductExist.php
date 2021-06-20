<?php

namespace App\Rules;

use App\Models\CategoryProduct;
use Illuminate\Contracts\Validation\Rule;

class CategoryMustProductExist implements Rule
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
        return CategoryProduct::find($value)->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Kategori produk tidak terdefinisi.';
    }
}

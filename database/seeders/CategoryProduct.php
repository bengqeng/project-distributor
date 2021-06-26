<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoryProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
            ['id' => 1, 'category_name' => 'Body Series', 'images_id' => 1, 'slug' => Str::slug('Body Series', '-')],
            ['id' => 2, 'category_name' => 'Rejuvenation Series', 'images_id' => 1, 'slug' => Str::slug('Rejuvenation Series', '-')],
            ['id' => 3, 'category_name' => 'Acne Series', 'images_id' => 1, 'slug' => Str::slug('Acne Series', '-')],
            ['id' => 4, 'category_name' => 'Decorative Makeup Series', 'images_id' => 1, 'slug' => Str::slug('Decorative Makeup Series', '-')],
        ]);
    }
}

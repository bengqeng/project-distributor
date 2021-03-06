<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            ['id' => 1, 'category_name' => 'Body Series', 'slug' => "Body Series"],
            ['id' => 2, 'category_name' => 'Rejuvenation Series', 'slug' => "Rejuvenation Series"],
            ['id' => 3, 'category_name' => 'Acne Series', 'slug' => "Acne Series"],
            ['id' => 4, 'category_name' => 'Decorative Makeup Series', 'slug' => "Decorative Makeup Series"],
        ]);
    }
}

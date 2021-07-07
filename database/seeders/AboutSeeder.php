<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            ['id' => 1, 'title' => 'About Us', 'description' => "About Us masih dalam proses pengisian"],
        ]);
    }
}

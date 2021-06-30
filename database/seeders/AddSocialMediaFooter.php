<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSocialMediaFooter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_media')->insert([
            ['media_type' => 'Youtube', 'view_type' => "footer"],
            ['media_type' => 'Twitter', 'view_type' => "footer"],
            ['media_type' => 'Tik Tok', 'view_type' => "footer"],
            ['media_type' => 'Facebook', 'view_type' => "footer"],
            ['media_type' => 'Instagram', 'view_type' => "footer"]
        ]);
    }
}

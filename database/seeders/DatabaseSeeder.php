<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AddRoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(CategoryProduct::class);
        $this->call(ProductSeeder::class);
        $this->call(AddSocialMediaFooter::class);
        $this->call(AboutSeeder::class);
    }
}

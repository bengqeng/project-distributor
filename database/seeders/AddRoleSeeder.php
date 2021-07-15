<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::where('name', 'Admin')->get()->count() < 1) {
            Role::create(
                ['name' => 'Admin']
            );
        }

        if (Role::where('name', 'Agent')->get()->count() < 1) {
            Role::create(
                ['name' => 'Agent']
            );
        }

        if (Role::where('name', 'Distributor')->get()->count() < 1) {
            Role::create(
                ['name' => 'Distributor']
            );
        }
    }
}

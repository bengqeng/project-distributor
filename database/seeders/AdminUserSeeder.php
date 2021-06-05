<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', '=', 'secretadmin@gmail.com');
        if ($admin->count() < 1){
            DB::table('users')->insert([
                'uuid' => Str::uuid(),
                'full_name' => "Secret Admin",
                'email' => "secretadmin@gmail.com",
                'username'  => "secretadmin",
                'password' => Hash::make('secretadmin'),
                'phone_number' => "0811111111",
                'status_register' => 'approved',
                'birthday' => Carbon::now(),
                'birth_place' => 'ahaidek',
                'gender' => "laki-laki",
                'address' => "address is secret",
                'banned' => false,
            ]);
            $admin = User::where('email', '=', 'secretadmin@gmail.com')->first();
            $admin->assignRole('Admin');
        }
        else {
            $admin->first()->assignRole('Admin');
        }
    }
}

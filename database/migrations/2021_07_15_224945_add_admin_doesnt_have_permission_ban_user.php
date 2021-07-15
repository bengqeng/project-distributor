<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddAdminDoesntHavePermissionBanUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Permission::create(
            ['name' => 'can ban user']
        );

        Permission::create(
            ['name' => 'can unban user']
        );

        $cekadmin = User::where('email', '=', 'secretadmin2@gmail.com');

        if ($cekadmin->count() < 1){
            DB::table('users')->insert([
                'uuid' => Str::uuid(),
                'full_name' => "Secret Admin 2",
                'email' => "secretadmin2@gmail.com",
                'username'  => "secretadmin2",
                'password' => Hash::make('secretadmin2'),
                'phone_number' => "082222222222",
                'status_register' => 'approved',
                'birthday' => Carbon::now(),
                'birth_place' => 'Rahasia',
                'gender' => "laki-laki",
                'address' => "address is secret",
                'banned' => false,
            ]);
        }

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
        }

        $admin = User::where('email', '=', 'secretadmin@gmail.com')->first();

        if(!$admin->hasPermissionTo('can ban user')){
            $admin->givePermissionTo('can ban user');
        }

        if(!$admin->hasPermissionTo('can unban user')){
            $admin->givePermissionTo('can unban user');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $canBan = Permission::where('name', 'can ban user');

        if($canBan->count() > 0){
            $canBan->delete();
        }

        User::whereIn('email', ['secretadmin2@gmail.com', 'secretadmin@gmail.com'])->delete();
    }
}

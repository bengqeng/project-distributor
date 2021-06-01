<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('status_register');
            $table->dateTime('birth_day', $precision = 0);
            $table->string('birth_place');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->longText('address');
            $table->string('province_id');
            $table->string('city_id');
            $table->string('kecamatan_id');
            $table->string('kelurahan_id');
            $table->string('rt/rw');
            $table->string('post_code');
            $table->boolean('banned')->default(0);
            $table->string('referral_id', 5)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

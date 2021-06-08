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
            $table->enum('account_type', ['Agent', 'Distributor']);
            $table->string('full_name');
            $table->string('email');
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->enum('status_register', ['hold', 'approved', 'rejected']);
            $table->dateTime('birthday', $precision = 0);
            $table->string('birth_place');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->longText('address')->nullable();
            $table->string('province_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('kelurahan_id')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('post_code')->nullable();
            $table->boolean('banned');
    $ref =  $table->string('referral_id', 5)->unique()->nullable();
            $table->timestamps();
            $ref->collation = 'utf8_bin';
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

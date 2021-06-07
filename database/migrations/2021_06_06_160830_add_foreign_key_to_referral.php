<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToReferral extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('referral', function (Blueprint $table) {
      $table->foreign('referral_uuid')->references('uuid')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('referral', function (Blueprint $table) {
      $table->dropForeign('referral_uuid_foreign');
    });
  }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterImages extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
public function up(){
  Schema::create('master_images', function (Blueprint $table) {
    $table->id();
    $table->enum('category', ['carousel', 'article', 'about_us', 'gallery', 'product']);
    $table->string('title');
    $table->string('url_path');
    $table->binary('master_images');
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
    Schema::dropIfExists('master_images');
}
}

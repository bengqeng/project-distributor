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
            $table->enum('category', ['corousel', 'news', 'about_us', 'gallery', 'product']);
            $table->string('url_path');
            $table->binary('images');
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

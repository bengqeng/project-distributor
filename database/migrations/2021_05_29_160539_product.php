<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->longText('tabdesc')->nullable();
            $table->longText('howtouse')->nullable();
            $table->longText('ingredients')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('images_1')->nullable();
            $table->integer('images_2')->nullable();
            $table->integer('images_3')->nullable();
            $table->integer('images_4')->nullable();
            $table->boolean('show')->default(1);
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
        Schema::dropIfExists('product');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price');
            $table->double('price_old')->nullable();
            $table->integer('num_reviews')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('fk_brand');
            $table->integer('quantity');
            $table->integer('fk_size');
            $table->string('fk_color');
            $table->string('avatar')->nullable();
            $table->string('images')->nullable();
            $table->boolean('in_stock');
            $table->integer('fk_category');
            $table->string('description');
            $table->string('details');
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
        Schema::dropIfExists('products');
    }
}

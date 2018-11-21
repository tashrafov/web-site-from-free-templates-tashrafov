<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_product_id');
            $table->integer('fk_order_id');
            $table->integer('fk_order_status_code_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('rma_number');
            $table->integer('rma_issued_by');
            $table->timestamp('rma_issue_date');
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
        Schema::dropIfExists('order_details');
    }
}

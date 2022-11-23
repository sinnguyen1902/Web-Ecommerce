<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_oder_details', function (Blueprint $table) {
            $table->increments('order_details_id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_sales_quantity');

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
        Schema::dropIfExists('tbl_oder_details');
    }
}

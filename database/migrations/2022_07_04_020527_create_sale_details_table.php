<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->decimal('quantity');
            $table->string('measure');
            $table->decimal('price');
            $table->decimal('cash')->nullable();
            $table->decimal('debit')->nullable();
            $table->decimal('biopayment')->nullable();
            $table->decimal('dollar')->nullable();
            $table->decimal('movilpayment')->nullable();
            $table->decimal('transfer')->nullable();
            $table->decimal('tax');
            $table->decimal('discount');
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
        Schema::dropIfExists('sale_details');
    }
}

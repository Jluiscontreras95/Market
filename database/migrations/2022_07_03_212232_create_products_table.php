<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('code_product')->unique()->nullable();
            $table->string('name')->unique();
            $table->decimal('stock')->default(0);
            $table->enum('measure',['KG','UND','LTRS'])->default('UND');
            $table->enum('measure_alter',['CAJA','BULTO','CESTA','BLISTER','SACO'])->nullable();
            $table->decimal('measure_alter_cant')->nullable();
            $table->string('image')->nullable();
            $table->decimal('cost_price');
            $table->decimal('utility');
            $table->decimal('sell_price');
            $table->decimal('cost_price_may')->nullable();
            $table->decimal('utility_may')->nullable();
            $table->decimal('sell_price_may')->nullable();
            $table->enum('status',['ACTIVE','DESACTIVATED'])->default('ACTIVE');
            $table->enum('taxproduct',['SI','NO'])->default('SI');
            $table->decimal('tax');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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

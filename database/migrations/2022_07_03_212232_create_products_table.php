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
            $table->string('name')->unique();
            $table->decimal('stock')->default(0);
            $table->enum('measure',['KG','UND'])->default('UND');
            $table->string('image')->nullable();
            $table->decimal('cost_price');
            $table->decimal('utility');
            $table->decimal('sell_price');
            $table->enum('status',['ACTIVE','DESACTIVATED'])->default('ACTIVE');
            $table->enum('taxproduct',['SI','NO'])->default('SI');
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

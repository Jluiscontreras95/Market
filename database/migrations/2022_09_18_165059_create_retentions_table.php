<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retentions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->string('n_control')->nullable();
            $table->string('n_debit')->nullable();
            $table->string('total')->nullable();
            $table->string('exempt_amount')->nullable();
            $table->string('taxable_base')->nullable();
            $table->string('share')->nullable();
            $table->string('iva')->nullable();
            $table->string('retention')->nullable();
            $table->string('detained')->nullable();
            $table->string('total_pagar')->nullable();
            $table->string('total_neto')->nullable();
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
        Schema::dropIfExists('retentions');
    }
}

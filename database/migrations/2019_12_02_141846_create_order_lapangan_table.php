<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLapanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lapangan_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->foreign('lapangan_id')->references('id')->on('lapangans');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lapangan');
    }
}

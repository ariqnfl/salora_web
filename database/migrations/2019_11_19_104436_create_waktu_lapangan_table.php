<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuLapanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan_waktu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('waktu_id')->unsigned()->nullable();
            $table->unsignedBigInteger('lapangan_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('waktu_id')->references('id')->on('waktus');
            $table->foreign('lapangan_id')->references('id')->on('lapangans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_lapangan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    public function up()
    {
        Schema::create('travel_datang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_id');
            $table->string('transportasi');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->boolean('bantuan');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('pesertas');
        });
        Schema::create('travel_pergi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_id');
            $table->string('transportasi');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->boolean('bantuan');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('pesertas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('travel_datang');
        Schema::dropIfExists('travel_pergi');
    }
}

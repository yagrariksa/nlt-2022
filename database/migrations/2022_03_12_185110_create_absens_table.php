<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_id');
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('pesertas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('absens');
    }
}

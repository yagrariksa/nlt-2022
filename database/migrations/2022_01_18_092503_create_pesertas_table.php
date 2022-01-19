<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('handphone');
            $table->string('foto_url');
            $table->string('ktp_url');
            $table->string('alergi');
            $table->boolean('city_tour');
            $table->boolean('vegan')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('travel_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}

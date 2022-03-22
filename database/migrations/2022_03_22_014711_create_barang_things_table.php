<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kat_id')->unique();
            $table->string('nama');
            $table->string('parent_id')->nullable();
            $table->timestamps();
        });
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('bar_id')->unique();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('berat');
            $table->string('desc');
            $table->string('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('kat_id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
        Schema::dropIfExists('kategoris');
    }
}

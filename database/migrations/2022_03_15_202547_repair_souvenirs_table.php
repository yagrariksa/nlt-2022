<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RepairSouvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('souvenirs');
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->id();
            $table->string('json_id');
            $table->string('nama');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('berat_gram');
            $table->integer('total_harga');
            $table->integer('total_berat');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('souvenirs');
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_id');
            $table->string('item_id');
            $table->string('item_name');
            $table->string('item_count');
            $table->string('item_price');
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('pesertas');
        });
    }
}

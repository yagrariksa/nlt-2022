<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKantongsTable extends Migration
{
    public function up()
    {
        Schema::create('kantongs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->integer('total_berat_gram');
            $table->string('alamat');
            $table->string('invoice_url')->nullable();
            $table->integer('total_ongkir');

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('souvenirs', function (Blueprint $table) {
            $table->unsignedBigInteger('kantong_id');
            $table->foreign('kantong_id')->references('id')->on('kantongs');
        });
    }

    public function down()
    {
        Schema::table('souvenirs', function (Blueprint $table) {
            $table->dropForeign(['kantong_id']);
            $table->dropColumn('kantong_id');
        });
        Schema::dropIfExists('kantongs');
    }
}

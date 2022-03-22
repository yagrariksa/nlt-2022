<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTotalanColumnFromKantongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->dropColumn('jumlah');
            $table->dropColumn('total_harga');
            $table->dropColumn('total_berat_gram');

            $table->string('nama_penerima')->nullable();
            $table->string('no_penerima')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->integer('jumlah')->nullable();
            $table->integer('total_harga')->nullable();
            $table->integer('total_berat_gram')->nullable();

            $table->dropColumn('nama_penerima');
            $table->dropColumn('no_penerima');
        });
    }
}

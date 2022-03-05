<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokumenFieldToPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->string('doc_vaksin')->nullable();
            $table->string('doc_izin')->nullable();
            $table->string('doc_pernyataan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropColumn('doc_vaksin');
            $table->dropColumn('doc_izin');
            $table->dropColumn('doc_pernyataan');
        });
    }
}

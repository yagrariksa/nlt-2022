<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePesertasField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropColumn('alergi');
            $table->dropColumn('vegan');
            $table->dropColumn('doc_vaksin');
            $table->dropColumn('doc_izin');
            $table->dropColumn('doc_pernyataan');
            $table->string('line')->nullable(true);
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
            $table->string('alergi')->nullable(true);
            $table->string('vegan')->nullable(true);
            $table->string('doc_vaksin')->nullable(true);
            $table->string('doc_izin')->nullable(true);
            $table->string('doc_pernyataan')->nullable(true);
            $table->dropColumn('line');

        });
    }
}

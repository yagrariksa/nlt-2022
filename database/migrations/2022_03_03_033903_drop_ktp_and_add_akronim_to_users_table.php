<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropKtpAndAddAkronimToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('akronim')->nullable();
        });

        Schema::table('pesertas', function(Blueprint $table){
            $table->dropColumn('ktp_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('akronim');
        });
        Schema::table('pesertas', function(Blueprint $table){
            $table->string('ktp_url')->nullable();
        });
    }
}

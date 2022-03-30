<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanToSouvenirs extends Migration
{
    public function up()
    {
        Schema::table('souvenirs', function (Blueprint $table) {
            $table->string('catatan');
        });
    }

    public function down()
    {
        Schema::table('souvenirs', function (Blueprint $table) {
            $table->dropColumn('catatan');
        });
    }
}

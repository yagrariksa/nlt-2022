<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKidToKantongs extends Migration
{
    public function up()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->string('kid')->unique();
        });
    }

    public function down()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->dropColumn('kid');
        });
    }
}

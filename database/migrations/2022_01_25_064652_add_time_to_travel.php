<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToTravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_datang', function (Blueprint $table) {
            $table->time('jam')->nullable();
        });
        Schema::table('travel_pergi', function (Blueprint $table) {
            $table->time('jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('travel_datang', function (Blueprint $table) {
            $table->dropColumn('jam');
        });
        Schema::table('travel_pergi', function (Blueprint $table) {
            $table->dropColumn('jam');
        });
    }
}

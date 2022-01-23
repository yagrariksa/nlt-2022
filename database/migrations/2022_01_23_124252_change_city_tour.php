<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCityTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropColumn('city_tour');
        });
        Schema::table('travel_pergi', function(Blueprint $table){
            $table->boolean('city_tour')->default(true);
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
            $table->boolean('city_tour')->default(true);
        });
        Schema::table('travel_pergi', function(Blueprint $table){
            $table->dropColumn('city_tour');
        });
    }
}

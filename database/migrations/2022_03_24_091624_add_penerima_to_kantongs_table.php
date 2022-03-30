<?php

use App\Models\Kantong;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddPenerimaToKantongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->string('penerima')->nullable();
            $table->string('no')->nullable();
        });

        foreach (Kantong::get() as $k) {
            $k->penerima = Str::random(10);
            $k->no = Str::random(10);
            $k->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kantongs', function (Blueprint $table) {
            $table->dropColumn('penerima');
            $table->dropColumn('no');
        });
    }
}

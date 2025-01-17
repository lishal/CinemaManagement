<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowtimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->time('show_time_start');
            $table->time('show_time_end');
            $table->date('show_date');
            $table->integer('price');
            $table->integer('totalseat')->default('50');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showtime');
    }
}

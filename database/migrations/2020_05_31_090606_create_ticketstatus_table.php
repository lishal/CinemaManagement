<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketstatus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('movie_name');
            $table->time('show_time_start');
            $table->time('show_time_end');
            $table->date('show_date');
            $table->integer('total_seat');
            $table->integer('total_amount');
            $table->enum('booking',['0', '1'])->default('0');
            $table->enum('paid',['0', '1'])->default('0');
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
        Schema::dropIfExists('ticketstatus');
    }
}

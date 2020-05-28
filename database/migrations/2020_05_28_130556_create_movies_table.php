<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movie_name', 100);
            $table->string('trailer_link');
            $table->binary('title_image');
            $table->string('duration_min');
            $table->string('director');
            $table->text('cast');
            $table->text('description');
            $table->date('release_date');
            $table->string('language');
            $table->enum('checkage',['0', '1'])->default('0');
            $table->enum('isActive',['0', '1'])->default('1');
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
        Schema::dropIfExists('movies');
    }
}

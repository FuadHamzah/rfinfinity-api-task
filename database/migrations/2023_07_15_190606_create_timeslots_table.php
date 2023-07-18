<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->increments('Id');
            $table->string ('Theater_name');
            $table->dateTime('Start_time')->nullable();
            $table->dateTime('End_time')->nullable();
            $table->integer('Movie_ID')->unsigned();

            $table->foreign('Movie_ID')->references('Id')->on('movies')->onDelete('cascade');
            $table->integer('Theater_room_no')->unsigned();
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
        Schema::dropIfExists('timeslots');
    }
};

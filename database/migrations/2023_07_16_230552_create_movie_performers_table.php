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
        Schema::create('movie_performers', function (Blueprint $table) {
            $table->integer('Movie_ID')->unsigned();
            $table->integer('Performer_ID')->unsigned();
            $table->float('Overall_rating')->default(5);

            $table->foreign('Movie_ID')->references('Id')->on('movies')->onDelete('cascade');
            $table->foreign('Performer_ID')->references('Id')->on('performers')->onDelete('cascade');
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
        Schema::dropIfExists('movie_performers');
    }
};

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
        Schema::create('b_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_books');
            $table->unsignedBigInteger('id_genres');

            $table->foreign('id_books')->references('id')->on('books');
            $table->foreign('id_genres')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_genres');
    }
};

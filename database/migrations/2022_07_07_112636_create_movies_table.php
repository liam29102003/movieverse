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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movies_id');
            $table->string('movies_name');
            $table->integer('category_id');
            $table->string('poster');
            $table->string('background');
            $table->string('genre');
            $table->integer('trending');

            $table->string('rating');
            $table->string('cast');
            $table->string('director');
            $table->string('award');
            $table->string('quality');
            $table->date('release_date');
            $table->string('runtime');
            $table->string('language');
            $table->longtext('review');
            $table->string('trailer');
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
};

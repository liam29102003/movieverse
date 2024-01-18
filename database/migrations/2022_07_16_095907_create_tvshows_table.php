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
        Schema::create('tvshows', function (Blueprint $table) {

            $table->id('tvshows_id');
            $table->string('tvshows_name');
            $table->integer('category_id');
            $table->boolean("complete");
            $table->string('poster');
            $table->string('background');
            $table->integer("trending");


            $table->string('rating');
            $table->string('cast');
            $table->string('director');
            $table->string('award');
            $table->date('release_date');
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
        Schema::dropIfExists('tvshows');
    }
};

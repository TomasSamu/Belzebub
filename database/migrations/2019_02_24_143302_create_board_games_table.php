<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('min_players');
            $table->smallInteger('max_players');
            $table->smallInteger('play_time');
            $table->year('year');
            $table->string('image_url');
            $table->tinyInteger('age_range');
            $table->text('description');
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
        Schema::dropIfExists('board_games');
    }
}

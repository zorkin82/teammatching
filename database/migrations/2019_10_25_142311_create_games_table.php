<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('game_player', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id')->index();
            $table->unsignedBigInteger('player_id')->index();
            $table->text('team')->nullable();

            $table->timestamps();

            $table->unique(['game_id','player_id']);
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('player_id')->references('id')->on('players');
        });

        // Schema::create('game_player_team', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('game_id');
        //     $table->unsignedBigInteger('player_id');
        //     $table->text('team');
        //     $table->timestamps();

        //     $table->unique(['game_id','player_id', 'team']);
        //     $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        //     $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('game_player_team');
        Schema::dropIfExists('game_player');
        Schema::dropIfExists('games');
    }
}

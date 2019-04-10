<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('game_id');
            $table->integer('player_id');
            $table->integer('corporation_id');
            $table->integer('tr')->default(0);
            $table->integer('awards')->default(0);
            $table->integer('milestones')->default(0);
            $table->integer('gameboard')->default(0);
            $table->integer('cards')->default(0);
            $table->integer('result')->default(0);
            $table->integer('megacredits')->default(0);
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
        Schema::dropIfExists('scores');
    }
}

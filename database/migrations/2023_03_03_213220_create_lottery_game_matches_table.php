<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lottery_game_matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('lottery_games');

            $table->date('start_date');
            $table->dateTime('start_time');
            $table->unsignedBigInteger('winner_id');
            $table->boolean('is_finished')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lottery_game_matches');
    }
};

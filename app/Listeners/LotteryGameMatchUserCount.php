<?php

namespace App\Listeners;

use App\Events\LotteryGameMatchUserEvent;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Support\Facades\DB;

class LotteryGameMatchUserCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LotteryGameMatchUserEvent  $event
     * @return void
     */
    public function handle(LotteryGameMatchUserEvent $event)
    {
        $lottery_game_match_id = $event->LotteryGameMatchUser->getLotteryGameMatchId();

        $match =  LotteryGameMatch::query()->find($lottery_game_match_id);

        $lottery_game_id = $match->getLotteryGameId();

        $game = LotteryGame::query()->find($lottery_game_id);

        $gamer_count = $game['gamer_count'];

        $countMatches= LotteryGameMatchUser::query()
            ->where('lottery_game_match_id', '=', $lottery_game_match_id)
            ->count();

        if ($countMatches >= $gamer_count) {
            return false;
        }
    }
}

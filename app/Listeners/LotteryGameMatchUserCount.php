<?php

namespace App\Listeners;

use App\Events\LotteryGameMatchUserEvent;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Psy\Exception\ErrorException;

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


        try {
            if ($countMatches >= $gamer_count) {
                throw new \Exception('You have exceeded the required number of players! Sign up for the next match');
            }
        }catch (\Exception $e)
        {
            echo $e->getMessage();
            die();
        }

    }
}

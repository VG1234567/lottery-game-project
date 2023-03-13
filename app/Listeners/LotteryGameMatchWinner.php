<?php

namespace App\Listeners;

use App\Events\LotteryGameMatchEvent;
use App\Models\LotteryGameMatchUser;

class LotteryGameMatchWinner
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
     * @param  LotteryGameMatchEvent  $event
     * @return void
     */
    public function handle(LotteryGameMatchEvent $event)
    {

        $lottery_game_match_id =  $event->LotteryGameMatch-> getLotteryGameMatchId();

        $recordedUser = LotteryGameMatchUser::query()->where(
            'lottery_game_match_id', '=', $lottery_game_match_id
        )->get();

        foreach ($recordedUser as $record) {
            $userId[] = $record->getUserId();
        }
        $winnerIdKey = array_rand($userId,1);

        $winnerId = $userId[$winnerIdKey];

        $event->LotteryGameMatch['winner_id'] = $winnerId;
    }
}

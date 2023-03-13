<?php

namespace App\Listeners;

use App\Events\LotteryGameMatchAddPointsEvent;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\User;

class LotteryGameMatchAddPoints
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
     * @param  LotteryGameMatchAddPointsEvent  $event
     * @return void
     */
    public function handle(LotteryGameMatchAddPointsEvent $event)
    {

        $lottery_game_id = $event->LotteryGameMatch->getLotteryGameId();

        $winner_id = $event->LotteryGameMatch->getWinnerId();

        $reward_points = LotteryGame::query()->find($lottery_game_id)['reward_points'];

        $user = User::query()->find($winner_id);

        $user['points'] = $reward_points;

        $user->save();
    }
}

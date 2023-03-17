<?php

namespace App\Listeners;

use App\Events\LotteryGameMatchUserEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Exception;

class LotteryGameMatchUserRecording
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
     * @return string
     */
    public function handle(LotteryGameMatchUserEvent $event)
    {
        $user_id = $event->LotteryGameMatchUser->getUserId();

        $lottery_game_match_id = $event->LotteryGameMatchUser->getLotteryGameMatchId();

        $recording = DB::table('lottery_game_match_users')->where([
           ['user_id','=',$user_id],
           ['lottery_game_match_id','=',$lottery_game_match_id],
        ])->first();


        try {
            if (!empty($recording)) {
                throw new \Exception('You have already signed up for this match!');
            }
        }catch (\Exception $e)
        {
            echo $e->getMessage();
            die();
        }

    }
}

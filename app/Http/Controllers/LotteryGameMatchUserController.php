<?php

namespace App\Http\Controllers;

use App\Events\OneUserOneMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Http\Request;

class LotteryGameMatchUserController extends Controller
{

    public function store(Request $request)
    {
        //validation

        $this->validate($request, [
            'user_id' => 'required',
            'lottery_game_match_id' => 'required',
        ]);

        $user_id = $request->input('user_id');
        $lottery_game_match_id = $request->input('lottery_game_match_id');

        $lottery_game_match_user = LotteryGameMatchUser::create([
            'user_id' => $user_id,
            'lottery_game_match_id' => $lottery_game_match_id,
        ]);

        $lottery_game_match_user->save();

        return response()->json($lottery_game_match_user);
    }

}

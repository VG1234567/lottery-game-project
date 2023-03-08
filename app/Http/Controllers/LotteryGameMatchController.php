<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotteryGameMatchResource;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryGameMatchController extends Controller
{

    public function store(Request $request)
    {
        //validation
        $this -> validate($request,[
            'start_date'=>'required|string|after_or_equal:today',
            'start_time'=>'required|string',
            'lottery_game_id'=>'required',
        ]);

        $lottery_game_match = new LotteryGameMatch();

        $lottery_game_match->start_date = $request->input('start_date');
        $lottery_game_match->start_time = $request->input('start_time');
        $lottery_game_match->lottery_game_id = $request->input('lottery_game_id');

        $lottery_game_match->save();
        return response()->json($lottery_game_match);
    }


    public function update(Request $request, $lottery_game_id)
    {

        //validation
        $this -> validate($request,[
            'is_finished'=>'required',
        ]);

        $lottery_game_match = LotteryGameMatch::find($lottery_game_id);
        $lottery_game_match -> is_finished = $request->input('is_finished');

        $lottery_game_match -> save();

        return response()->json( $lottery_game_match);
    }

    public function index($lottery_game_id){

        $lottery_game_match = DB::table('lottery_game_matches')
            ->where('lottery_game_id','=',$lottery_game_id)->get();

        return response()->json($lottery_game_match);
    }

}

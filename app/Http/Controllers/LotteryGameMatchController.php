<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotteryGameMatchResource;
use App\Models\LotteryGameMatch;
use Illuminate\Http\Request;

class LotteryGameMatchController extends Controller
{

    public function store(Request $request){

        //validation
        $this -> validate($request,[
            'start_date'=>'required',
            'start_time'=>'required',
        ]);

        $lottery_game_match = new LotteryGameMatch();

        $lottery_game_match->start_date = $request->input('start_date');
        $lottery_game_match->start_time = $request->input('start_time');

        $lottery_game_match->save();

        return response()->json($lottery_game_match);
    }

    public function index($id){
        $lottery_game_matches = LotteryGameMatchResource::collection(LotteryGameMatch::all());
        return response()->json($lottery_game_matches);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotteryGameResource;
use App\Models\LotteryGame;
use Illuminate\Http\Request;

class LotteryGameController extends Controller
{

    public function index(){
        $lottery_games = LotteryGameResource::collection(LotteryGame::all());
        return response()->json($lottery_games);
    }

}

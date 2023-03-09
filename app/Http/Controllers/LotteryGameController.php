<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotteryGameMatchResource;
use App\Http\Resources\LotteryGameResource;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryGameController extends Controller
{

    public function index(){

        $lottery_games = LotteryGameResource::collection(LotteryGame::all());
        return response()->json($lottery_games);

    }

}

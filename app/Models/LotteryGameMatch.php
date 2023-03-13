<?php

namespace App\Models;

use App\Events\LotteryGameMatchAddPointsEvent;
use App\Events\LotteryGameMatchEvent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class LotteryGameMatch extends Model
{

    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'start_date','start_time', 'lottery_game_id','winner_id','is_finished',
    ];

    public function lottery_games()
    {
        return $this->belongsTo(LotteryGame::class,'lottery_game_id','id');
    }

    public function lottery_game_match_users()
    {
        return $this->hasMany(LotteryGameMatchUser::class,'lottery_game_match_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'winner_id','id');
    }

    public function getLotteryGameId()
    {
        return $this->lottery_game_id;
    }

    public function getWinnerId()
    {
        return $this->winner_id;
    }

    public function getIsFinished()
    {
        return $this->is_finished;
    }

    public function getLotteryGameMatchId()
    {
        return $this->id;
    }
    protected $dispatchesEvents = [
        'updating' => LotteryGameMatchEvent::class,
        'updated' => LotteryGameMatchAddPointsEvent::class,
    ];

}

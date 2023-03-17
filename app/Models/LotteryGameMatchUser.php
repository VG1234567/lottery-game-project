<?php

namespace App\Models;

use App\Events\LotteryGameMatchUserEvent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class LotteryGameMatchUser extends Model
{

    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'user_id', 'lottery_game_match_id',
    ];

    public function lottery_game_matches()
    {
        return $this->belongsTo(LotteryGameMatch::class,'lottery_game_match_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getLotteryGameMatchId()
    {
        return $this->lottery_game_match_id;
    }

    public function getLotteryGameMatchUserId()
    {
        return $this->id;
    }

    protected $dispatchesEvents = [
        'creating' => LotteryGameMatchUserEvent::class,
    ];

}

<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class LotteryGame extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'name','gamer_count', 'reward_points',
    ];

    public function lottery_game_matches()
    {
        return $this->hasMany(LotteryGameMatch::class, 'lottery_game_id','id');
    }

}

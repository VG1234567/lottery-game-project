<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class LotteryGameMatch extends Model
{

    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'start_date', 'start_time',
    ];

    public function lottery_games()
    {
        return $this->belongsTo(LotteryGame::class);
    }

    public function lottery_game_match_users()
    {
        return $this->hasMany(LotteryGameMatchUser::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}

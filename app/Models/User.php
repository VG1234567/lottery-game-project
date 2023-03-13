<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements JWTSubject, AuthenticatableContract,AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'first_name','last_name', 'email',
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lottery_game_match_users()
    {
        return $this->hasMany(LotteryGameMatchUser::class,'user_id','id');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }


}

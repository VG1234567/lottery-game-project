<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'password',
    ];
    public function lottery_game_match_users()
    {
        return $this->hasMany(LotteryGameMatchUser::class);
    }

    public function lottery_game_matches()
    {
        return $this->belongsTo(LotteryGameMatch::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}

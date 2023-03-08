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

    const ROLE_ADMIN = 0;
    const ROLE_GUEST = 1;
    const ROLE_USER = 2;

    public static function getRole()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_GUEST => 'Гость',
            self::ROLE_USER => 'Авторизованный пользователь',
        ];

    }

    protected $fillable = [
        'first_name','last_name', 'email',
    ];

    protected $hidden = [
        'password',
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

}

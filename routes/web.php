<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Events\Event;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\LotteryGameMatchController;
use FastRoute\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', function () use ($router) {
    return $router->app->version();
});
//Guest
$router->group(['prefix'=>'api'],function () use ($router){
    $router->post('/users/register', 'AuthController@register');
    $router->post('/users/login', 'AuthController@login');
    $router->get('/lottery_games', 'LotteryGameController@index');
    $router->get('/lottery_game_match/{lottery_game_id}', 'LotteryGameMatchController@index');
});
//Admin
$router->group(['middleware' => ['auth','isadmin'], 'prefix' => 'api'],function () use ($router){
    $router->get('/lottery_games', 'LotteryGameController@index');
    $router->post('/lottery_game_matches', 'LotteryGameMatchController@store');
    $router->put('/lottery_game_matches/{lottery_game_id}', 'LotteryGameMatchController@update');
    $router->get('/lottery_game_match/{lottery_game_id}', 'LotteryGameMatchController@index');
    $router->get('/users', 'UserController@index');
});
//Authorized user
$router->group(['middleware' => 'auth', 'prefix' => 'api'],function () use ($router){
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/delete/{id}', 'UserController@destroy');
    $router->get('/lottery_games', 'LotteryGameController@index');
    $router->post('/lottery_game_matches', 'LotteryGameMatchController@store');
    $router->get('/lottery_game_match/{lottery_game_id}', 'LotteryGameMatchController@index');
});


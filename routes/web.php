<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->group(['prefix'=>'api'],function () use ($router){
    $router->post('/users/register', 'UserController@store');
    $router->post('/users/login', 'AuthController@login');
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/delete/{id}', 'UserController@destroy');
    $router->get('/lottery_games', 'LotteryGameController@index');
    $router->post('/lottery_game_matches ', 'LotteryGameMatchController@store');
//$router->put('/api/lottery_game_matches ', 'LotteryGameMatchController@update');
    $router->post('/lottery_game_match_users ', 'LotteryGameMatchUserController@store');
    $router->get('/lottery_game_matches/lottery_game_id/{id}', 'LotteryGameMatchController@index');
    $router->get('/users', 'UserController@index');
});


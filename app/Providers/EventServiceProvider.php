<?php

namespace App\Providers;

use App\Events\LotteryGameMatchAddPointsEvent;
use App\Events\LotteryGameMatchEvent;
use App\Events\LotteryGameMatchUserEvent;
use App\Listeners\LotteryGameMatchAddPoints;
use App\Listeners\LotteryGameMatchUserCount;
use App\Listeners\LotteryGameMatchUserRecording;
use App\Listeners\LotteryGameMatchWinner;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        LotteryGameMatchUserEvent::class => [
            LotteryGameMatchUserRecording::class,
            LotteryGameMatchUserCount::class,
        ],
        LotteryGameMatchEvent::class => [
            LotteryGameMatchWinner::class,
        ],
        LotteryGameMatchAddPointsEvent::class => [
            LotteryGameMatchAddPoints::class,
        ],
    ];

    public function shouldDiscoverEvents()
    {
        return false;
    }
}

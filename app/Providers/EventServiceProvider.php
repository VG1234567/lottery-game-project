<?php

namespace App\Providers;

use App\Listeners\OneUserOneMatchHandler;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use app\Events\OneUserOneMatch;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        OneUserOneMatch::class => [
            OneUserOneMatchHandler::class,
        ],
    ];

    public function shouldDiscoverEvents()
    {
        return true;
    }
}

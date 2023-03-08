<?php

namespace App\Listeners;

use App\Events\OneUserOneMatch;

class OneUserOneMatchHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OneUserOneMatch  $event
     * @return void
     */
    public function handle(OneUserOneMatch $event)
    {
        echo $event->string;
    }
}

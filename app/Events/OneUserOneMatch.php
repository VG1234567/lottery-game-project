<?php

namespace App\Events;

use App\Models\LotteryGameMatchUser;

class OneUserOneMatch extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

}

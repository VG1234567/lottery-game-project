<?php

namespace App\Events;

use App\Models\LotteryGameMatch;
use Illuminate\Queue\SerializesModels;

class LotteryGameMatchEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    use SerializesModels;

    public LotteryGameMatch $LotteryGameMatch;

    public function __construct(LotteryGameMatch $LotteryGameMatch)
    {
        $this->LotteryGameMatch = $LotteryGameMatch;
    }
}

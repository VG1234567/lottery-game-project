<?php

namespace App\Events;

use App\Models\LotteryGameMatch;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class LotteryGameMatchAddPointsEvent extends Event
{
    use InteractsWithSockets, SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public LotteryGameMatch $LotteryGameMatch;

    public function __construct(LotteryGameMatch $LotteryGameMatch)
    {
        $this->LotteryGameMatch = $LotteryGameMatch;
    }
}

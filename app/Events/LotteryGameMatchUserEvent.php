<?php

namespace App\Events;

use App\Models\LotteryGameMatchUser;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class LotteryGameMatchUserEvent extends Event
{

    use InteractsWithSockets, SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public LotteryGameMatchUser $LotteryGameMatchUser;
    public function __construct(LotteryGameMatchUser $LotteryGameMatchUser)
    {
        $this->LotteryGameMatchUser = $LotteryGameMatchUser;
    }
}

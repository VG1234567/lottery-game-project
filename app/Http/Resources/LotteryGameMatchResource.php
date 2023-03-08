<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LotteryGameMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'start_date'=>$this->start_date,
            'start_time'=>$this->start_time,
            'lottery_game_id'=>$this->lottery_game_id,
        ];
    }
}

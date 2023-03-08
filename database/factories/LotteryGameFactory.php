<?php

namespace Database\Factories;

use App\Models\LotteryGame;
use Illuminate\Database\Eloquent\Factories\Factory;

class LotteryGameFactory extends Factory
{
    protected $model = LotteryGame::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name,
            'gamer_count' => random_int(1,100),
            'reward_points' => random_int(0,1000),
    	];
    }
}

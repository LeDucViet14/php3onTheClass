<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'         => User::all()->random()->user_id,
            'totalPrice'         =>$this->faker->randomFloat(2,1,100),
            'created_at'    => $this->faker->dateTime,
            'updated_at'    => $this->faker->dateTime,
        ];
    }
}

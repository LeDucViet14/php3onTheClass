<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Orders;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdersDetail>
 */
class OrdersDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id'         => Orders::all()->random()->order_id,
            'product_id'         => Product::all()->random()->product_id,
            'price'         =>$this->faker->randomFloat(2,1,100),
            'created_at'    => $this->faker->dateTime,
            'updated_at'    => $this->faker->dateTime,
        ];
    }
}

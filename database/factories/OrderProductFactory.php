<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "order_id" => Order::factory(),
      "product_id" => Product::factory(),
      "quantity" => $this->faker->numberBetween(2, 50),
      "sub_total" => $this->faker->randomFloat(1, 10, 1500)
    ];
  }
}

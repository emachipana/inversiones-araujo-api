<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "client_id" => Client::factory(),
      "shipping_type" => $this->faker->randomElement(["express", "normal", "coordinar"]),
      "pay_type" => $this->faker->randomElement(["tarjeta", "deposito"]),
      "status" => $this->faker->randomElement(["pending", "delivered"]),
      "total" => $this->faker->randomFloat(1, 20, 900)
    ];
  }
}

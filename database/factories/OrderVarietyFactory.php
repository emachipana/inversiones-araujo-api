<?php

namespace Database\Factories;

use App\Models\Variety;
use App\Models\VitroOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderVariety>
 */
class OrderVarietyFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $price = $this->faker->randomFloat(1, 0.6, 1.2);
    $quantity = $this->faker->randomNumber(4);

    return [
      "variety_id" => Variety::factory(),
      "vitro_order_id" => VitroOrder::factory(),
      "price" => $price,
      "quantity" => $quantity,
      "sub_total" => $price * $quantity,
      "variety_name" => ""
    ];
  }
}

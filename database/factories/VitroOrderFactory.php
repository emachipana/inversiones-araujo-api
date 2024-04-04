<?php

namespace Database\Factories;

use App\Models\Variety;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VitroOrder>
 */
class VitroOrderFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $price = $this->faker->randomFloat(1, 0.4, 1.5);
    $quantity = $this->faker->numberBetween(500, 10000);
    $total = $price * $quantity;
    $advance = ($total - $this->faker->numberBetween($total/2, ($total/2 + 100)));

    return [
      "document" => $this->faker->randomNumber(8),
      "document_type" => $this->faker->randomElement(["ruc", "dni"]),
      "first_name" => $this->faker->name(),
      "last_name" => $this->faker->lastName(),
      "destination" => $this->faker->city(),
      "variety_id" => Variety::factory(),
      "price" => $price,
      "quantity" => $quantity,
      "total" => $total,
      "advance" => $advance,
      "pending" => $total - $advance,
      "init_date" => $this->faker->dateTimeThisYear(),
      "finish_date" => $this->faker->dateTimeThisYear(),
      "phone" => $this->faker->randomNumber(9)
    ];
  }
}

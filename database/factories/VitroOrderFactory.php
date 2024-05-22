<?php

namespace Database\Factories;

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
    $total = $this->faker->randomFloat(1, 1000, 5000);
    $advance = $this->faker->randomFloat(1, 500, 950);

    return [
      "document" => $this->faker->randomNumber(8),
      "document_type" => $this->faker->randomElement(["dni", "ruc"]),
      "first_name" => $this->faker->name(),
      "last_name" => $this->faker->lastName(),
      "destination" => $this->faker->city(),
      "total" => $total,
      "advance" => $advance,
      "pending" => $total - $advance,
      "init_date" => $this->faker->dateTimeThisYear(),
      "finish_date" => $this->faker->dateTimeThisYear(),
      "phone" => $this->faker->randomNumber(9),
      "status" => $this->faker->randomElement(["pending", "delivered"])
    ];
  }
}

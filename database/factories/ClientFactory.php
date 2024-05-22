<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "address" => $this->faker->streetAddress(),
      "department" => $this->faker->state(),
      "city" => $this->faker->city(),
      "phone" => $this->faker->randomNumber(9),
      "document" => $this->faker->randomNumber(8),
      "first_name" => $this->faker->name(),
      "last_name" => $this->faker->lastName(),
      "email" => $this->faker->email(),
      "consumption" => $this->faker->randomFloat(1, 10, 900)
    ];
  }
}

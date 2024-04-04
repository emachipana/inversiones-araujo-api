<?php

namespace Database\Factories;

use App\Models\Tuber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variety>
 */
class VarietyFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => $this->faker->randomElement(["canchan", "andina", "largo", "amarillo", "costeño"]),
      "price" => $this->faker->randomFloat(1, 0.4, 1.5),
      "tuber_id" => Tuber::factory()
    ];
  }
}

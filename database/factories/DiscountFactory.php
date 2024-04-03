<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "product_id" => Product::factory(),
      "price" => $this->faker->randomFloat(2, 5, 99),
      "percentage" => $this->faker->numberBetween(10, 99)
    ];
  }
}

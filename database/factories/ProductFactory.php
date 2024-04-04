<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => $this->faker->sentence(4),
      "description" => $this->faker->text(),
      "price" => $this->faker->randomFloat(2, 100, 900),
      "stock" => $this->faker->numberBetween(2, 50),
      "category_id" => Category::factory(),
      "sub_category_id" => SubCategory::factory()
    ];
  }
}

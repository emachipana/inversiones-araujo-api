<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $quantity = $this->faker->numberBetween(2, 10);
    $price = $this->faker->randomFloat(1, 10, 500);

    return [
      "invoice_id" => Invoice::factory(),
      "product_id" => Product::factory(),
      "quantity" => $quantity,
      "igv_is_apply" => $this->faker->randomElement([true, false]),
      "price" => $price,
      "sub_total" => $quantity * $price,
      "product_name" => $this->faker->sentence(4)
    ];
  }
}

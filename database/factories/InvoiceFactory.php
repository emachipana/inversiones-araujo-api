<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $invoice_type = $this->faker->randomElement(["factura", "boleta"]);

    return [
      "invoice_type" => $invoice_type,
      "document_type" => $invoice_type == "factura" ? "ruc" : "dni",
      "document" => $this->faker->randomNumber(8),
      "currency_type" => $this->faker->randomElement(["sol", "dolar americano"]),
      "first_name" => $this->faker->name(),
      "last_name" => $this->faker->lastName(),
      "issue_date" => $this->faker->dateTimeThisYear(),
      "due_date" => $this->faker->dateTimeThisYear(),
      "pdf_url" => $this->faker->url(),
      "address" => $this->faker->streetAddress(),
      "total" => $this->faker->randomFloat(1, 20, 1000)
    ];
  }
}

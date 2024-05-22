<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "full_name" => $this->faker->name(),
      "phone" => $this->faker->randomNumber(9),
      "subject" => $this->faker->sentence(),
      "content" => $this->faker->text(),
      "origin" => $this->faker->randomElement(["agroinvitro", "inversiones"]),
      "email" => $this->faker->email()
    ];
  }
}

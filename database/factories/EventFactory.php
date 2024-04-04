<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => $this->faker->sentence(),
      "date" => $this->faker->dateTimeThisYear(),
      "description" => $this->faker->text(),
      "event_type" => $this->faker->randomElement(["invitro", "cotidiana"]),
      "user_id" => User::factory()
    ];
  }
}

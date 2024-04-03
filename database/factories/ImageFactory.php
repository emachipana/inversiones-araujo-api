<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "url" => $this->faker->randomElement([
        "https://http2.mlstatic.com/D_NQ_NP_703223-MLC32168119697_092019-O.webp",
        "https://hagalo.mx/23210-large_default/tijera-para-podar-curva-8-pulgadas-truper-18453.jpg",
        "https://http2.mlstatic.com/D_NQ_NP_851478-MLA54911942504_042023-O.webp",
        "https://hydroenv.com.mx/catalogo/images/00/soluciones_y_nutrientes/fertilizantes/Fertilizantes/cab.jpg"
      ])
    ];
  }
}

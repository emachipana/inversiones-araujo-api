<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $products = Product::all();

    for($i = 1; $i <= 10; $i++) {
      $product = $products->random();

      Discount::factory()->create([
        "product_id" => $product->id
      ]);
    }
  }
}

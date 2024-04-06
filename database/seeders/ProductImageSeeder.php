<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $products = Product::all();
    $images = Image::all();

    $products->each(function ($product) use ($images) {
      $image = $images->random();

      ProductImage::factory()->create([
        "product_id" => $product->id,
        "image_id" => $image->id
      ]);
    });
  }
}

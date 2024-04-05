<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = Category::all();

    Product::factory()->count(100)->create()->each(function ($product) use ($categories) { // error, crea categories y sub categories adicionales
      $category = $categories->random();
      $subCategory = $category->subCategories()->get()->random();

      $product->update([
        "category_id" => $category->id,
        "sub_category_id" => $subCategory->id
      ]);
    });
  }
}

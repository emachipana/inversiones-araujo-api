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

    for($i = 1; $i <= 100; $i++) {
      $category = $categories->random();
      $subCategory = $category->subCategories()->get()->random();
  
      Product::factory()->count(1)->create([
        "category_id" => $category->id,
        "sub_category_id" => $subCategory->id
      ]);
    }
  }
}

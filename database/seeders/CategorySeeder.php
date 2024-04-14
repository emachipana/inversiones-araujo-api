<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $list = ["campo", "invernadero", "laboratorio", "riego"];

    foreach($list as $category) {
      $newCategory = Category::create([
        "name" => $category
      ]);

      for($i = 1; $i <= 3; $i++) {
        SubCategory::factory()->create([
          "category_id" => $newCategory->id
        ]);
      }
    }
  }
}

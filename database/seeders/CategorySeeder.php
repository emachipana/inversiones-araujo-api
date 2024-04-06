<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Category::factory()->count(5)->hasSubCategories(4)->create();

    Category::factory()->count(3)->hasSubCategories(2)->create();

    Category::factory()->count(2)->hasSubCategories(1)->create();
  }
}

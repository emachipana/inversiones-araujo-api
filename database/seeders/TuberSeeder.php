<?php

namespace Database\Seeders;

use App\Models\Tuber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TuberSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Tuber::factory()->count(3)->hasVarieties(4)->create();
  }
}

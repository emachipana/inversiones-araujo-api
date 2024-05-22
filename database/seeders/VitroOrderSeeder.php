<?php

namespace Database\Seeders;

use App\Models\VitroOrder;
use Illuminate\Database\Seeder;

class VitroOrderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    VitroOrder::factory()->count(50)->create();
  }
}

<?php

namespace Database\Seeders;

use App\Models\Variety;
use App\Models\VitroOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VitroOrderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $varieties = Variety::all();

    for($i = 1; $i <= 10; $i++) {
      $variety = $varieties->random();

      VitroOrder::factory()->create([
        "variety_id" => $variety->id
      ]);
    }
  }
}

<?php

namespace Database\Seeders;

use App\Models\OrderVariety;
use App\Models\Variety;
use App\Models\VitroOrder;
use Illuminate\Database\Seeder;

class OrderVarietySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $vitroOrders = VitroOrder::all();
    $varieties = Variety::all();

    $vitroOrders->each(function ($order) use ($varieties) {
      for($i = 1; $i <= 2; $i++) {
        $variety = $varieties->random();

        OrderVariety::factory()->create([
          "variety_id" => $variety->id,
          "vitro_order_id" => $order->id,
          "variety_name" => $variety->name
        ]);
      }
    });
  }
}

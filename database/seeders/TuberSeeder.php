<?php

namespace Database\Seeders;

use App\Models\Tuber;
use App\Models\Variety;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TuberSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $list = [
      [
        "name" => "papa",
        "varieties" => ["andina", "tumbay", "canchan", "peruanita"]
      ],
      [
        "name" => "camote",
        "varieties" => ["amarillo", "blanco"]
      ],
    ];

    foreach($list as $tuber) {
      $newTuber = Tuber::create([
        "name" => $tuber["name"]
      ]);

      foreach($tuber["varieties"] as $variety) {
        Variety::create([
          "tuber_id" => $newTuber->id,
          "price" => 0.8,
          "name" => $variety
        ]);
      }
    }
  }
}

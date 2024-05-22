<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $clients = Client::all();

    for($i = 1; $i <= 50; $i++) {
      $client = $clients->random();

      Order::factory()->create([
        "client_id" => $client->id
      ]);
    }
  }
}

<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $orders = Order::all();
    $products = Product::all();

    $orders->each(function ($order) use ($products) {
      
      for($i = 1; $i <= 3; $i++) {
        $product = $products->random();

        OrderProduct::factory()->create([
          "product_id" => $product->id,
          "order_id" => $order->id
        ]);
      }
    });
  }
}

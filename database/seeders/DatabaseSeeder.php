<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      CategorySeeder::class,
      ProductSeeder::class,
      DiscountSeeder::class,
      ImageSeeder::class,
      ProductImageSeeder::class,
      InvoiceSeeder::class,
      InvoiceItemSeeder::class,
      TuberSeeder::class,
      VitroOrderSeeder::class,
      AdminSeeder::class
    ]);
  }
}

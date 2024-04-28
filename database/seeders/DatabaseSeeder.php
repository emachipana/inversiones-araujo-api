<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      CategorySeeder::class,
      // ProductSeeder::class,
      // DiscountSeeder::class,
      // ImageSeeder::class,
      // ProductImageSeeder::class,
      // InvoiceSeeder::class,
      // InvoiceItemSeeder::class,
      // TuberSeeder::class,
      AdminSeeder::class,
      // ClientSeeder::class,
      UserSeeder::class,
      // EventSeeder::class,
      // OrderSeeder::class,
      // OrderProductSeeder::class,
      // MessageSeeder::class
    ]);
  }
}

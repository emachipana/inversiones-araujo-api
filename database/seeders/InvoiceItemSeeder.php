<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $invoices = Invoice::all();
    $products = Product::all();

    $invoices->each(function ($invoice) use ($products) {
      $product = $products->random();

      InvoiceItem::factory()->count(3)->create([
        "product_id" => $product->id,
        "invoice_id" => $invoice->id
      ]);
    });
  }
}

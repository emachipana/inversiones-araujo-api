<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('invoice_items', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger("invoice_id");
      $table->unsignedBigInteger("product_id")->nullable();
      $table->integer("quantity");
      $table->boolean("igv_is_apply")->default(true);
      $table->float("price");
      $table->float("sub_total");
      $table->string("product_name");
      $table->timestamps();

      $table->foreign("invoice_id")->references("id")->on("invoices");
      $table->foreign("product_id")->references("id")->on("products");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('invoice_items');
  }
};

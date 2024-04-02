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
    Schema::create('offer_products', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger("offer_id");
      $table->unsignedBigInteger("product_id");
      $table->timestamps();

      $table->foreign("offer_id")->references("id")->on("offers");
      $table->foreign("product_id")->references("id")->on("products");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('offer_products');
  }
};

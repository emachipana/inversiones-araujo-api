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
    Schema::create('order_varieties', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger("variety_id")->nullable();
      $table->unsignedBigInteger("vitro_order_id")->nullable();
      $table->float("price");
      $table->integer("quantity");
      $table->float("sub_total");
      $table->string("variety_name");
      $table->timestamps();

      $table->foreign("vitro_order_id")->references("id")->on("vitro_orders");
      $table->foreign("variety_id")->references("id")->on("varieties");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('order_varieties');
  }
};

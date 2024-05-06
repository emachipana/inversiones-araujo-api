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
    Schema::create('expenses', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->float("price");
      $table->integer("quantity");
      $table->float("sub_total");
      $table->unsignedBigInteger("profit_id");
      $table->timestamps();

      $table->foreign("profit_id")->references("id")->on("profits");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('expenses');
  }
};

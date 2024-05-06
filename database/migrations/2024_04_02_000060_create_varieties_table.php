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
    Schema::create('varieties', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->float("price");
      $table->unsignedBigInteger("tuber_id")->nullable();
      $table->timestamps();

      $table->foreign("tuber_id")->references("id")->on("tubers");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('varieties');
  }
};

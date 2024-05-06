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
    Schema::create('profits', function (Blueprint $table) {
      $table->id();
      $table->string("month");
      $table->float("expense")->default(0);
      $table->float("income")->default(0);
      $table->float("profit")->default(0);
      $table->unsignedBigInteger("admin_id");
      $table->timestamps();
      
      $table->foreign("admin_id")->references("id")->on("admins");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('profits');
  }
};

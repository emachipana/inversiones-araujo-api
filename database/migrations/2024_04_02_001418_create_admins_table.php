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
    Schema::create('admins', function (Blueprint $table) {
      $table->id();
      $table->text("business_description")->nullable();
      $table->string("business_keywords")->nullable();
      $table->string("first_name");
      $table->string("last_name");
      $table->string("email");
      $table->float("total_expenses")->default(0);
      $table->float("total_income")->default(0);
      $table->float("total_profit")->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('admins');
  }
};

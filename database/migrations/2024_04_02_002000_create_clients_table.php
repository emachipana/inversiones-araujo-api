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
    Schema::create('clients', function (Blueprint $table) {
      $table->id();
      $table->string("address")->nullable();
      $table->string("department")->nullable();
      $table->string("city")->nullable();
      $table->integer("phone")->nullable();
      $table->integer("document")->nullable();
      $table->integer("consumption")->default(0);
      $table->string("first_name");
      $table->string("last_name");
      $table->string("email");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('clients');
  }
};

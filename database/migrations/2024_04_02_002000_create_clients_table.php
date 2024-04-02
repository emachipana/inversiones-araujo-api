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
      $table->string("address");
      $table->string("department");
      $table->string("city");
      $table->integer("phone")->nullable();
      $table->string("receipt_type");
      $table->integer("document");
      $table->string("document_type");
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

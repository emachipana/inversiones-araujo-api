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
    Schema::create('messages', function (Blueprint $table) {
      $table->id();
      $table->string("first_name");
      $table->string("email");
      $table->string("last_name");
      $table->integer("phone")->nullable();
      $table->string("subject");
      $table->text("content");
      $table->string("origin");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('messages');
  }
};

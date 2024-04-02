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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string("user_type")->default("client");
      $table->unsignedBigInteger("client_id")->nullable();
      $table->unsignedBigInteger("admin_id")->nullable();
      $table->unsignedBigInteger("image_id")->nullable();
      $table->string("username");
      $table->string("password");
      $table->timestamps();

      $table->foreign("client_id")->references("id")->on("clients");
      $table->foreign("admin_id")->references("id")->on("admins");
      $table->foreign("image_id")->references("id")->on("images");
    });
  } 

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};

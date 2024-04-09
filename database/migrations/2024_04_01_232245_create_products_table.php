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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->text("description");
      $table->float("price");
      $table->integer("stock");
      $table->boolean("is_active")->default(true);
      $table->unsignedBigInteger("category_id")->nullable();
      $table->unsignedBigInteger("sub_category_id")->nullable();
      $table->timestamps();

      $table->foreign("category_id")->references("id")->on("categories");
      $table->foreign("sub_category_id")->references("id")->on("sub_categories");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};

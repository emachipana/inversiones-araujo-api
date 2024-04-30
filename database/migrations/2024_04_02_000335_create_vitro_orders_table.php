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
    Schema::create('vitro_orders', function (Blueprint $table) {
      $table->id();
      $table->integer("document");
      $table->string("document_type");
      $table->string("first_name");
      $table->string("last_name")->nullable();
      $table->string("destination");
      $table->float("total")->default(0);
      $table->float("advance");
      $table->float("pending");
      $table->dateTime("init_date");
      $table->dateTime("finish_date");
      $table->integer("phone");
      $table->unsignedBigInteger("invoice_id")->nullable();
      $table->unsignedBigInteger("image_id")->nullable();
      $table->string("status")->default("pending");
      $table->timestamps();

      $table->foreign("invoice_id")->references("id")->on("invoices");
      $table->foreign("image_id")->references("id")->on("images");
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('vitro_orders');
  }
};

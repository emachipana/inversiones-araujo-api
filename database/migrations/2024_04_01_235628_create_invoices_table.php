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
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->string("invoice_type");
      $table->string("document_type");
      $table->integer("document");
      $table->string("currency_type");
      $table->string("first_name");
      $table->string("last_name")->nullable();
      $table->text("address");
      $table->dateTime("issue_date");
      $table->dateTime("due_date");
      $table->string("comment")->nullable();
      $table->string("pdf_url");
      $table->float("total")->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('invoices');
  }
};

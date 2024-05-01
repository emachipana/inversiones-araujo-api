<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;

  protected $fillable = [
    "invoice_type",
    "document_type",
    "document",
    "currency_type",
    "first_name",
    "last_name",
    "issue_date",
    "due_date",
    "comment",
    "pdf_url",
    "address",
    "total"
  ];

  public function vitroOrder() {
    return $this->hasOne(VitroOrder::class);
  }

  public function order() {
    return $this->hasOne(Order::class);
  }

  public function invoiceItems() {
    return $this->hasMany(InvoiceItem::class);
  }
}

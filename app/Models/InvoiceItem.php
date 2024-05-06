<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
  use HasFactory;

  protected $fillable = [
    "invoice_id",
    "product_id",
    "quantity",
    "price",
    "igv_is_apply",
    "sub_total",
    "product_name"
  ];

  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function invoice() {
    return $this->belongsTo(Invoice::class);
  }
}

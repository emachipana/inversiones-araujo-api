<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  use HasFactory;

  protected $fillable = [
    "order_id",
    "product_id",
    "quantity",
    "sub_total",
    "product_name"
  ];

  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function order() {
    return $this->belongsTo(Order::class);
  }
}

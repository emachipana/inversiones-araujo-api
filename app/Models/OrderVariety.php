<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVariety extends Model
{
  use HasFactory;

  protected $fillable = [
    "variety_id",
    "vitro_order_id",
    "price",
    "quantity",
    "sub_total"
  ];

  public function vitroOrder() {
    return $this->belongsTo(VitroOrder::class);
  }

  public function variety() {
    return $this->belongsTo(Variety::class);
  }
}

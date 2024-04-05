<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "price",
    "tuber_id"
  ];

  public function vitroOrders() {
    return $this->hasMany(VitroOrder::class);
  }

  public function tuber() {
    return $this->belongsTo(Tuber::class);
  }
}

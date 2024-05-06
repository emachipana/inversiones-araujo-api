<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitroOrder extends Model
{
  use HasFactory;

  protected $fillable = [
    "document_type",
    "document",
    "first_name",
    "last_name",
    "destination",
    "total",
    "pending",
    "advance",
    "init_date",
    "finish_date",
    "phone",
    "invoice_id",
    "image_id",
    "status"
  ];

  public function image() {
    return $this->belongsTo(Image::class);
  }

  public function invoice() {
    return $this->belongsTo(Invoice::class);
  }

  public function orderVarieties() {
    return $this->hasMany(OrderVariety::class);
  } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  use HasFactory;

  protected $fillable = [
    "title",
    "sub_title",
    "is_used"
  ];

  public function offerProducts() {
    return $this->hasMany(OfferProduct::class);
  }
}

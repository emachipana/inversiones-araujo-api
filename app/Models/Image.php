<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  use HasFactory;

  protected $fillable = [
    "url"
  ];

  public function productImage() {
    return $this->hasOne(ProductImage::class);
  }

  public function vitroOrder() {
    return $this->hasOne(VitroOrder::class);
  }

  public function user() {
    return $this->hasOne(User::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  use HasFactory;

  protected $fillable = [
    "image_id",
    "product_id"
  ];

  public function image() {
    return $this->belongsTo(Image::class);
  }

  public function product() {
    return $this->belongsTo(Product::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "description",
    "price",
    "stock",
    "category_id",
    "sub_category_id",
    "is_active"
  ];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function subCategory() {
    return $this->belongsTo(SubCategory::class);
  }

  public function discount() {
    return $this->hasOne(Discount::class);
  }

  public function offerProducts() {
    return $this->hasMany(OfferProduct::class);
  }

  public function productImages() {
    return $this->hasMany(ProductImage::class);
  }

  public function invoiceItems() {
    return $this->hasMany(InvoiceItem::class);
  }

  public function orderProducts() {
    return $this->hasMany(OrderProduct::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  use HasFactory;

  protected $fillable = [
    "name",
    "price",
    "quantity",
    "sub_total"
  ];

  public function profit() {
    return $this->belongsTo(Profit::class);
  }
}
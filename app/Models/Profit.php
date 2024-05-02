<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
  use HasFactory;

  protected $fillable = [
    "month",
    "expenses",
    "income",
    "profit"
  ];

  public function expenses() {
    return $this->hasMany(Expense::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
  use HasFactory;

  protected $fillable = [
    "month",
    "expense",
    "income",
    "profit",
    "admin_id"
  ];

  public function expenses() {
    return $this->hasMany(Expense::class);
  }
}

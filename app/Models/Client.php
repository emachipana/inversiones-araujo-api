<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;

  protected $fillable = [
    "address",
    "department",
    "city",
    "phone",
    "receipt_type",
    "document",
    "consumption",
    "first_name",
    "last_name",
    "email"
  ];

  public function orders() {
    return $this->hasMany(Order::class);
  }

  public function user() {
    return $this->hasOne(User::class);
  }
}

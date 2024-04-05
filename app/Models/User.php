<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;

  protected $fillable = [
    "client_id",
    "admin_id",
    "image_id",
    "username",
    "password"
  ];

  public function resets() {
    return $this->hasMany(Reset::class);
  }
}

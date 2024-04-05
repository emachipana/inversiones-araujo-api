<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  use HasFactory;

  protected $fillable = [
    "business_description",
    "business_keywords",
    "first_name",
    "last_name"
  ];

  public function user() {
    return $this->hasOne(User::class);
  }
}

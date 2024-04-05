<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuber extends Model
{
  use HasFactory;

  protected $fillable = [
    "name"
  ];

  public function varieties() {
    return $this->hasMany(Variety::class);
  }
}

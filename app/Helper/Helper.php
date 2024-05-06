<?php

namespace App\Helper;

use Carbon\Carbon;

class Helper {
  public function getMonth() {
    $date = Carbon::now();
    $month = Carbon::parse($date);
    $month->locale("es");
    
    return $month->translatedFormat("F");
  }
}

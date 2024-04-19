<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class VitroOrderFilter extends ApiFilter {
  protected $safeParams = [
    "variety_id" => ["eq"],
    "destination" => ["eq"],
    "status" => ["eq"]
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

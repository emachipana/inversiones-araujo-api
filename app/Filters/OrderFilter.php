<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class OrderFilter extends ApiFilter {
  protected $safeParams = [
    "destination" => ["eq"],
    "ship_type" => ["eq"],
    "status" => ["eq"],
    "pay_type" => ["eq"]
  ];

  protected $columnMap = [
    "ship_type" => "shipping_type"
  ];

  protected $operatorMap = [
    "eq" => "="
  ];
}

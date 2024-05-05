<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class EventFilter extends ApiFilter {
  protected $safeParams = [
    "month" => ["eq"],
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

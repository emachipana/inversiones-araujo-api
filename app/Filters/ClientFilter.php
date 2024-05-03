<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class ClientFilter extends ApiFilter {
  protected $safeParams = [
    "department" => ["eq"],
    "city" => ["eq"]
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class VitroOrderFilter extends ApiFilter {
  protected $safeParams = [
    "destination" => ["eq"],
    "status" => ["eq"],
    "init_date" => ["eq", "lt", "lte", "gt", "gte"],
    "finish_date" => ["eq", "lt", "lte", "gt", "gte"]
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "=",
    "lt" => "<",
    "lte" => "<=",
    "gt" => ">",
    "gte" => ">="
  ];
}

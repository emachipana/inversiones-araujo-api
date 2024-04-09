<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class ProductFilter extends ApiFilter {
  protected $safeParams = [
    "min_price" => ["gte"],
    "max_price" => ["lte"]
  ];

  protected $columnMap = [
    "min_price" => "price",
    "max_price" => "price"
  ];

  protected $operatorMap = [
    "gte" => ">=",
    "lte" => "<="
  ];
}

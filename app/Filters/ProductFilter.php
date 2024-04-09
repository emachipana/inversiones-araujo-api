<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class ProductFilter extends ApiFilter {
  protected $safeParams = [
    "min_price" => ["gte", "gt"],
    "max_price" => ["lte", "lt"],
    "category_id" => ["eq"],
    "sub_category_id" => ["eq"],
    "is_active" => ["eq"]
  ];

  protected $columnMap = [
    "min_price" => "price",
    "max_price" => "price"
  ];

  protected $operatorMap = [
    "gte" => ">=",
    "lte" => "<=",
    "eq" => "=",
    "gt" => ">",
    "lt" => "<"
  ];
}

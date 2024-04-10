<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class SubCategoryFilter extends ApiFilter {
  protected $safeParams = [
    "category_id" => ["eq"]
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

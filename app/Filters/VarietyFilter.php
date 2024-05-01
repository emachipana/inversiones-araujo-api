<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class VarietyFilter extends ApiFilter {
  protected $safeParams = [
    "tuber_id" => ["eq"]
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

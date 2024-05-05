<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class MessageFilter extends ApiFilter {
  protected $safeParams = [
    "origin" => ["eq"],
  ];

  protected $columnMap = [];

  protected $operatorMap = [
    "eq" => "="
  ];
}

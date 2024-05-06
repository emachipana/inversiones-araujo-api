<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter {
  protected $safeParams = [
    "type" => ["eq"],
    "issue_date" => ["eq", "gt", "gte", "lt", "lte"]
  ];

  protected $columnMap = [
    "type" => "invoice_type"
  ];

  protected $operatorMap = [
    "eq" => "=",
    "gt" => ">",
    "gte" => ">=",
    "lt" => "<",
    "lte" => "<="
  ];
}

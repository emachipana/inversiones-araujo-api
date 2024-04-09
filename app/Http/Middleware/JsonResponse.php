<?php

namespace App\Http\Middleware;

use Closure;

class JsonResponse {
  public function handle($request, Closure $next) {
    $response = $next($request);

    if(!$response->isRedirection() && !$response->isSuccessful()) {
      $response->setContent(json_encode([
        "data" => $response->original
      ]));

      $response->header("Content-Type", "application/json");
    }

    return $response;
  }
}

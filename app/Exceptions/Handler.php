<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
  /**
   * The list of the inputs that are never flashed to the session on validation exceptions.
   *
   * @var array<int, string>
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   */
  public function register(): void
  {
    $this->reportable(function (Throwable $e) {
      //
    });
  }

  public function render($request, Throwable $exception) {
    if($exception instanceof ValidationException) {
      return response()->json([
        "message" => "Validation failed",
        "errors" => $exception->validator->errors()
      ], 422);
    }

    if($exception instanceof HttpException) {
      return response()->json([
        "message" => "Resource not found"
      ], $exception->getStatusCode());
    }

    return parent::render($request, $exception);
  }
}

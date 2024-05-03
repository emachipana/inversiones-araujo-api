<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      "address" => ["required", "min:3"],
      "department" => ["required", "min:3"],
      "city" => ["required", "min:3"],
      "phone" => ["required", "sometimes", "numeric"],
      "document" => ["required", "numeric"],
      "first_name" => ["required", "min:3"],
      "last_name" => ["required", "min:3"],
      "email" => ["required", "email", Rule::unique("clients", "email")]
    ];
  }
}

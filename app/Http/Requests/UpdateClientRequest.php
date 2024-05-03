<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
      "address" => ["required", "sometimes", "min:3"],
      "department" => ["required", "sometimes", "min:3"],
      "city" => ["required", "sometimes", "min:3"],
      "phone" => ["required", "sometimes", "numeric"],
      "document" => ["required", "sometimes", "numeric"],
      "first_name" => ["required", "sometimes", "min:3"],
      "last_name" => ["required", "sometimes", "min:3"],
    ];
  }
}

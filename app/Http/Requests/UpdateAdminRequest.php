<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
      "business_description" => ["required", "sometimes", "min:10"],
      "business_keywords" => ["required", "sometimes", "min:3"],
      "first_name" => ["required", "sometimes", "min:3"],
      "last_name" => ["required", "sometimes", "min:3"]
    ];
  }
}

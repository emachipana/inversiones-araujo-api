<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVitroOrderRequest extends FormRequest
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
      "document" => ["required", "numeric"],
      "document_type" => ["required", "min:3"],
      "first_name" => ["required", "min:3"],
      "last_name" => ["sometimes", "min:3"],
      "destination" => ["required"],
      "advance" => ["required", "numeric"],
      "init_date" => ["required", "date"],
      "finish_date" => ["required", "date"],
      "phone" => ["required", "numeric"]
    ];
  }
}

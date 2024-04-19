<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVitroOrderRequest extends FormRequest
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
      "document" => ["sometimes", "required", "numeric"],
      "document_type" => ["sometimes", "required", "min:3"],
      "first_name" => ["sometimes", "required", "min:3"],
      "last_name" => ["sometimes", "min:3"],
      "destination" => ["sometimes", "required"],
      "advance" => ["sometimes", "required", "numeric"],
      "finish_date" => ["sometimes", "required"],
      "phone" => ["sometimes", "required", "numeric"],
      "status" => ["sometimes", "required"]
    ];
  }
}

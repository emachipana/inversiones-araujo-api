<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMessageRequest extends FormRequest
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
      "first_name" => ["required", "min:3"],
      "last_name" => ["required", "min:3"],
      "email" => ["required", "email"],
      "phone" => ["required", "sometimes", "numeric"],
      "subject" => ["required", "min:3"],
      "content" => ["required", "min:10"],
      "origin" => ["required", Rule::in(["vitro", "inversiones"])]
    ];
  }
}

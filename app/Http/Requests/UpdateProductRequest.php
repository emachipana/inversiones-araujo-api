<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
    $method = $this->method();

    if($method == "PATCH") {
      return [
        "name" => ["sometimes", "required", "min:3"],
        "description" => ["sometimes", "required", "min:10"],
        "price" => ["sometimes", "required", "numeric"],
        "stock" => ["sometimes", "required", "numeric"],
        "category_id" => ["sometimes", "required"],
        "sub_category_id" => ["sometimes"],
        "is_active" => ["sometimes", Rule::in([1, 0])]
      ];
    }else { // PUT
      return [
        "name" => ["required", "min:3"],
        "description" => ["required", "min:10"],
        "price" => ["required", "numeric"],
        "stock" => ["required", "numeric"],
        "category_id" => ["required"],
        "sub_category_id" => ["sometimes"],
        "is_active" => ["required", Rule::in([1, 0])]
      ];
    }
  }
}

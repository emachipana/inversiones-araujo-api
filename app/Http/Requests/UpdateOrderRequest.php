<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
        "client_id" => ["sometimes", "required"],
        "shipping_type" => ["sometimes" ,"required", "min:3"],
        "pay_type" => ["sometimes" ,"required", "min:3"],
        "destination" => ["sometimes" ,"required", "min:3"],
        "invoice_id" => ["sometimes"]
      ];
    }else { // PUT
      return [
        "client_id" => ["required"],
        "shipping_type" => ["required", "min:3"],
        "pay_type" => ["required", "min:3"],
        "destination" => ["required", "min:3"],
        "invoice_id" => ["sometimes"]
      ];
    } 
  }
}

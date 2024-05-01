<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceItemRequest extends FormRequest
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
      "invoice_id" => ["required"],
      "product_id" => ["required"],
      "quantity" => ["required", "numeric"],
      "igv_is_apply" => ["required", "sometimes", Rule::in([1, 0])],
      "price" => ["required", "numeric"],
      "sub_total" => ["required", "numeric"],
      "product_name" => ["required", "min:3"]
    ];
  }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceItemRequest extends FormRequest
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
      "invoice_id" => ["required", "sometimes"],
      "product_id" => ["required", "sometimes"],
      "quantity" => ["required", "sometimes", "numeric"],
      "igv_is_apply" => ["required", "sometimes", Rule::in([1, 0])],
      "price" => ["required", "sometimes", "numeric"],
      "sub_total" => ["required", "sometimes", "numeric"],
      "product_name" => ["required", "sometimes", "min:3"]
    ];
  }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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
      "invoice_type" => ["required", Rule::in(["boleta", "factura"])],
      "document_type" => ["required", Rule::in(["dni", "ruc"])],
      "document" => ["required", "numeric"],
      "currency_type" => ["required", "min:3"],
      "first_name" => ["required", "min:3"],
      "last_name" => ["required", "sometimes", "min:3"],
      "address" => ["required", "min:3"],
      "issue_date" => ["required", "date"],
      "due_date" => ["required", "sometimes", "date"],
      "comment" => ["required", "sometimes", "min:3"],
      "pdf_url" => ["required"],
      "total" => ["required", "numeric"]
    ];
  }
}

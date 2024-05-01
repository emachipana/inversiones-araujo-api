<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
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
      "invoice_type" => ["required", "sometimes", Rule::in(["boleta", "factura"])],
      "document_type" => ["required", "sometimes", Rule::in(["dni", "ruc"])],
      "document" => ["required", "sometimes", "numeric"],
      "currency_type" => ["required", "sometimes", "min:3"],
      "first_name" => ["required", "sometimes", "min:3"],
      "last_name" => ["required", "sometimes", "min:3"],
      "address" => ["required", "sometimes", "min:3"],
      "issue_date" => ["required", "sometimes", "date"],
      "due_date" => ["required", "sometimes", "date"],
      "comment" => ["required", "sometimes", "min:3"],
      "pdf_url" => ["required", "sometimes"],
      "total" => ["required", "sometimes", "numeric"]
    ];
  }
}

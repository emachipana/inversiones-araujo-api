<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      "id" => $this->id,
      "invoice_type" => $this->invoice_type,
      "document_type" => $this->document_type,
      "document" => $this->document,
      "currency_type" => $this->currency_type,
      "first_name" => $this->first_name,
      "last_name" => $this->last_name,
      "address" => $this->address,
      "issue_date" => $this->issue_date,
      "due_date" => $this->due_date,
      "comment" => $this->comment,
      "pdf_url" => $this->pdf_url,
      "total" => $this->total,
      "document_type" => $this->document_type,
      "items" => InvoiceItemResource::collection($this->whenLoaded("invoiceItems")),
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

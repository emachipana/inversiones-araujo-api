<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
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
      "product" => new ProductResource($this->product->loadMissing("productImages")),
      "invoice_id" => $this->invoice_id,
      "quantity" => $this->quantity,
      "price" => $this->price,
      "igv_is_apply" => $this->igv_is_apply,
      "sub_total" => $this->sub_total,
      "product_name" => $this->product_name,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

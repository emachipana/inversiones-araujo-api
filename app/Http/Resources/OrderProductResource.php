<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
      "order_id" => $this->order_id,
      "product" => new ProductResource($this->product->loadMissing("productImages")),
      "quantity" => $this->quantity,
      "sub_total" => $this->sub_total,
      "product_name" => $this->product_name,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

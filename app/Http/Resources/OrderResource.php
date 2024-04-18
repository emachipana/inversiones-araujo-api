<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
      "client_id" => $this->client,
      "shipping_type" => $this->shipping_type,
      "pay_type" => $this->pay_type,
      "status" => $this->status,
      "total" => $this->total,
      "invoice_id" => $this->invoice_id,
      "destination" => $this->destination,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "order_products" => OrderProductResource::collection($this->whenLoaded("orderProducts"))
    ];
  }
}

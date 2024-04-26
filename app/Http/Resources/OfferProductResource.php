<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferProductResource extends JsonResource
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
      "offer_id" => $this->offer_id,
      "product" => new ProductResource($this->product->loadMissing("productImages")),
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

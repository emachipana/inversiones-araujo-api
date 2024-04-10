<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
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
      "product_id" => $this->product_id,
      "image_id" => $this->image_id,
      "image_url" => $this->image->url,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

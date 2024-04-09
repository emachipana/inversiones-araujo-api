<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
      "name" => $this->name,
      "description" => $this->description,
      "price" => $this->price,
      "stock" => $this->stock,
      "is_active" => $this->is_active,
      "category_id" => $this->category_id,
      "sub_category_id" => $this->sub_category_id,
      "images" => ProductImageResource::collection($this->whenLoaded("productImages")),
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

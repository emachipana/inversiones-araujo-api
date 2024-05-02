<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VitroOrderResource extends JsonResource
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
      "document" => $this->document,
      "document_type" => $this->document_type,
      "first_name" => $this->first_name,
      "last_name" => $this->last_name,
      "destination" => $this->destination,
      "total" => $this->total ?? 0,
      "advance" => $this->advance ?? 0,
      "pending" => $this->pending ?? 0,
      "init_date" => $this->init_date,
      "finish_date" => $this->finish_date,
      "phone" => $this->phone,
      "invoice" => $this->invoice,
      "varieties" => OrderVarietyResource::collection($this->whenLoaded("orderVarieties")),
      "image" => $this->image,
      "status" => $this->status ?? "pending",
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

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
      "price" => $this->price,
      "variety" => $this->variety,
      "tuber" => $this->variety->tuber,
      "quantity" => $this->quantity,
      "total" => $this->total,
      "advance" => $this->advance,
      "pending" => $this->pending,
      "init_date" => $this->init_date,
      "finish_date" => $this->finish_date,
      "phone" => $this->phone,
      "invoice" => $this->invoice,
      "image" => $this->image,
      "status" => $this->status,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

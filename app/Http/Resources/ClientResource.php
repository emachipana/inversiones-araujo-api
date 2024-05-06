<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
      "address" => $this->address,
      "department" => $this->department,
      "city" => $this->city,
      "phone" => $this->phone,
      "document" => $this->document,
      "consumption" => $this->consumption,
      "first_name" => $this->first_name,
      "last_name" => $this->last_name,
      "email" => $this->email,
      "user" => new UserResource($this->user),
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

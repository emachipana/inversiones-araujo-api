<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
      "user_type" => $this->user_type,
      "client" => $this->client,
      "admin" => $this->admin,
      "image" => $this->image,
      "username" => $this->username,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }
}

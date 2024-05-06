<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfitResource extends JsonResource
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
      "month" => $this->month,
      "expense" => $this->expense ?? 0,
      "income" => $this->income ?? 0,
      "profit" => $this->profit ?? 0,
      "items" => ExpenseResource::collection($this->whenLoaded("expenses"))
    ];
  }
}

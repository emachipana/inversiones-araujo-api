<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      "name" => ["required", "sometimes", "min:3"],
      "date" => ["required", "sometimes", "date"],
      "description" => ["required", "sometimes", "min:10"],
      "event_type" => ["required", "sometimes", Rule::in(["invitro", "viaje", "cotidiano"])]
    ];
  }
}

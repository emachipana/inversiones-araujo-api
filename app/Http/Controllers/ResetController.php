<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckResetRequest;
use App\Http\Requests\StoreResetRequest;
use App\Http\Resources\ResetResource;
use App\Models\Reset;
use Ramsey\Uuid\Uuid;

class ResetController extends Controller
{
  protected function generateCode() {
    $uuid = Uuid::uuid4();
    $code = strtoupper(substr($uuid->toString(), 0, 5));
    $code = str_replace("-", "", $code);

    return $code;
  }


  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreResetRequest $request)
  {
    $data = $request->all();
    $data["code"] = $this->generateCode();

    return new ResetResource(Reset::create($data));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Reset $reset)
  {
    $reset->delete();
  }

  public function check(CheckResetRequest $request, Reset $reset) {
    $data = $request->all();
    $response = [
      "data" => [
        "is_valid" => false
      ]
    ];

    if($data["code"] == $reset->code) $response["data"]["is_valid"] = true;
  
    return response()->json($response);
  }
}

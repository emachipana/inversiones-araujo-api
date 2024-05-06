<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\StoreProfitRequest;
use App\Http\Requests\UpdateProfitRequest;
use App\Http\Resources\ProfitCollection;
use App\Http\Resources\ProfitResource;
use App\Models\Profit;

class ProfitController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $profits = Profit::with("expenses")->orderBy("created_at", "desc")->get();

    return new ProfitCollection($profits);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProfitRequest $request)
  {
    $data = $request->all();
    $helper = new Helper();
    $data["month"] = $helper->getMonth();
    $data["profit"] = $data["income"] ?? 0;
    $find = Profit::where("month", $data["month"])->first();

    if($find) return response()->json(["message" => "El mes ya fue creado"], 422);

    return new ProfitResource(Profit::create($data));
  }

  /**
   * Display the specified resource.
   */
  public function show(Profit $profit)
  {
    return new ProfitResource($profit); 
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProfitRequest $request, Profit $profit)
  {
    $data = $request->all();
    $data["profit"] = $data["income"] - $profit->expense;
    $profit->update($data);

    return new ProfitResource($profit);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Profit $profit)
  {
    $profit->expenses()->delete();
    $profit->delete();
  }
}

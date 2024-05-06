<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderVarietyRequest;
use App\Http\Requests\UpdateOrderVarietyRequest;
use App\Http\Resources\OrderVarietyResource;
use App\Models\OrderVariety;
use App\Models\Variety;

class OrderVarietyController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOrderVarietyRequest $request)
  {
    $data = $request->all();
    $variety = Variety::findOrFail($data["variety_id"]);
    $sub_total = $data["price"] * $data["quantity"];
    $data["sub_total"] = $sub_total;
    $data["variety_name"] = $variety->name;
    $newOrderVariety = OrderVariety::create($data);
    $order = $newOrderVariety->vitroOrder;
    $total = $order->total + $sub_total;
    $order->update([
      "total" => $total,
      "pending" => $total - $order->advance
    ]);

    return new OrderVarietyResource($newOrderVariety);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOrderVarietyRequest $request, OrderVariety $orderVariety)
  {
    $data = $request->all();
    $order = $orderVariety->vitroOrder;
    $sub_total = $orderVariety->sub_total;

    if(isset($data["variety_id"])) {
      $variety = Variety::findOrFail($data["variety_id"]);
      $data["variety_name"] = $variety->name;
    }
    
    if(isset($data["price"]) && isset($data["quantity"])) {
      $sub_total = $data["price"] * $data["quantity"];
    }else if(isset($data["price"])) {
      $sub_total = $data["price"] * $orderVariety->quantity;
    }else if(isset($data["quantity"])) {
      $sub_total = $orderVariety->price * $data["quantity"];
    }
    
    $total = ($order->total - $orderVariety->sub_total) + $sub_total;
    $data["sub_total"] = $sub_total;
    $orderVariety->update($data);

    $order->update([
      "total" => $total,
      "pending" => $total - $order->advance
    ]);

    return new OrderVarietyResource($orderVariety);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderVariety $orderVariety)
  {
    $order = $orderVariety->vitroOrder;
    $total = $order->total - $orderVariety->sub_total;

    $order->update([
      "total" => $total,
      "pending" => $total - $orderVariety->vitroOrder->advance
    ]);

    $orderVariety->delete();
  }
}

<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilter;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new OrderFilter();
    $queryItems = $filter->transform($request);
    $orders = Order::where($queryItems)
                ->with("orderProducts")
                ->orderBy("created_at", "desc")
                ->get();

    return new OrderCollection($orders);
  }

  /**
   * Display the specified resource.
   */
  public function show(Order $order)
  {
    return new OrderResource($order->loadMissing("orderProducts"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOrderRequest $request)
  {
    return new OrderResource(Order::create($request->all()));
  }

  /**
  * Update the specified resource in storage.
  */
  public function update(UpdateOrderRequest $request, Order $order)
  {
    $order->update($request->all());

    return new OrderResource($order->loadMissing("orderProducts"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Order $order)
  {
    $order->orderProducts()->delete();

    $order->delete();
  }
}

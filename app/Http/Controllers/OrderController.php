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
                ->orderBy("created_at", "desc");

    return new OrderCollection($orders->paginate(18)->appends($request->query()));
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
    $data = $request->all();
    $total = $data["shipping_type"] == "express" ? 12 : 8;
    $data["total"] = $total;

    return new OrderResource(Order::create($data));
  }

  /**
  * Update the specified resource in storage.
  */
  public function update(UpdateOrderRequest $request, Order $order)
  {
    $data = $request->all();
    
    if(isset($data["shipping_type"])) {
      $data["total"] = 
        $order->total
        - ($data["shipping_type"] == "express" ? 8 : 12)
        + ($data["shipping_type"] == "express" ? 12 : 8);
    }

    $order->update($data);

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

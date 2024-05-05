<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;
use App\Http\Resources\OrderProductResource;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderProductController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOrderProductRequest $request)
  {
    $data = $request->all();
    $product = Product::findOrFail($data["product_id"]);
    $sub_total = $data["quantity"] * $product->price;

    if($product->discount) $sub_total = $data["quantity"] * $product->discount->price;

    $data["sub_total"] = $sub_total;
    $data["product_name"] = $product->name;
    $newOrderProduct = OrderProduct::create($data);
    $newOrderProduct->order->update(["total" => $newOrderProduct->order->total + $sub_total]);

    return new OrderProductResource($newOrderProduct);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOrderProductRequest $request, OrderProduct $orderProduct)
  {
    $data = $request->all();
    $sub_total = $data["quantity"] * $orderProduct->product->price;

    if($orderProduct->product->discount) $sub_total = $data["quantity"] * $orderProduct->product->discount->price;
    $data["sub_total"] = $sub_total;

    $orderProduct->order->update([
      "total" => ($orderProduct->order->total - $orderProduct->sub_total) + $sub_total
    ]);
    $orderProduct->update($data);

    return new OrderProductResource($orderProduct);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderProduct $orderProduct)
  {
    $orderProduct->order->update([
      "total" => $orderProduct->order->total - $orderProduct->sub_total
    ]);

    $orderProduct->delete();
  }
}

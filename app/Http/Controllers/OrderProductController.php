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

    if($product->discount) {
      $sub_total = $data["quantity"] * $product->discount->price;
    }else {
      $sub_total = $data["quantity"] * $product->price;
    }

    return new OrderProductResource(OrderProduct::create([
      "product_id" => $data["product_id"],
      "order_id" => $data["order_id"],
      "quantity" => $data["quantity"],
      "sub_total" => $sub_total,
      "product_name" => $product->name
    ]));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOrderProductRequest $request, OrderProduct $orderProduct)
  {
    $data = $request->all();

    if($orderProduct->product->discount) {
      $sub_total = $data["quantity"] * $orderProduct->product->discount->price;
    }else {
      $sub_total = $data["quantity"] * $orderProduct->product->price;
    }

    $orderProduct->update([
      "quantity" => $data["quantity"],
      "sub_total" => $sub_total
    ]);

    return new OrderProductResource($orderProduct);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderProduct $orderProduct)
  {
    $orderProduct->delete();
  }
}

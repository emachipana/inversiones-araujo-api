<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{ 
  protected function discountPercentage($product_id, $price) {
    $product = Product::findOrFail($product_id);
    $percentage = ($product->price - $price) / $product->price * 100;

    return ceil($percentage);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDiscountRequest $request)
  {
    $data = $request->all();
    $product_id = $data["product_id"];
    $price = $data["price"];

    $percentage = $this->discountPercentage($product_id, $price);

    return new DiscountResource(Discount::create([
      "product_id" => $product_id,
      "price" => $price,
      "percentage" => ceil($percentage)
    ]));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDiscountRequest $request, Discount $discount)
  {
    $data = $request->all();
    $price = $data["price"];

    $percentage = $this->discountPercentage($discount->product->id, $price);

    $discount->update([
      "price" => $price,
      "percentage" => $percentage
    ]);

    return new DiscountResource($discount);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Discount $discount)
  {
    $discount->delete();
  }
}

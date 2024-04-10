<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Http\Resources\ProductImageResource;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductImageRequest $request)
  {
    return new ProductImageResource(ProductImage::create($request->all()));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductImageRequest $request, ProductImage $productImage)
  {
    $productImage->update($request->all());

    return new ProductImageResource($productImage);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ProductImage $productImage)
  {
    $productImage->delete();
  }
}

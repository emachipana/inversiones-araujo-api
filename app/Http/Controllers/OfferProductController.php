<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferProductRequest;
use App\Http\Requests\UpdateOfferProductRequest;
use App\Http\Resources\OfferProductResource;
use App\Models\OfferProduct;

class OfferProductController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOfferProductRequest $request)
  {
    return new OfferProductResource(OfferProduct::create($request->all()));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOfferProductRequest $request, OfferProduct $offerProduct)
  {
    $offerProduct->update($request->all());

    return new OfferProductResource($offerProduct);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OfferProduct $offerProduct)
  {
    $offerProduct->delete();
  }
}

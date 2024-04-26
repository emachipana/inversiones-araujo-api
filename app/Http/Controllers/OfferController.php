<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Resources\OfferCollection;
use App\Http\Resources\OfferResource;
use App\Models\Offer;

class OfferController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $offers = Offer::with("offerProducts")->get();

    return new OfferCollection($offers);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreOfferRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Offer $offer)
  {
    return new OfferResource($offer->loadMissing("offerProducts"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateOfferRequest $request, Offer $offer)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Offer $offer)
  {
      //
  }
}

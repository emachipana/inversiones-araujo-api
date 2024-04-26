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
    return new OfferResource(Offer::create($request->all()));
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
    $offer->update($request->all());

    return new OfferResource($offer);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Offer $offer)
  {
    $offer->offerProducts()->delete();

    $offer->delete();
  }
}

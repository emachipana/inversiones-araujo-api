<?php

namespace App\Http\Controllers;

use App\Filters\VitroOrderFilter;
use App\Http\Requests\StoreVitroOrderRequest;
use App\Http\Requests\UpdateVitroOrderRequest;
use App\Http\Resources\VitroOrderCollection;
use App\Http\Resources\VitroOrderResource;
use App\Models\VitroOrder;
use Illuminate\Http\Request;

class VitroOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new VitroOrderFilter();
    $queryItems = $filter->transform($request);
    $vitroOrders = VitroOrder::where($queryItems)->orderBy("created_at", "desc")->get();

    return new VitroOrderCollection($vitroOrders);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVitroOrderRequest $request)
  {
    $data = $request->all();
    $total = $data["price"] * $data["quantity"];
    $pending = $total - $data["advance"];

    $data["total"] = $total;
    $data["pending"] = $pending;

    return new VitroOrderResource(VitroOrder::create($data));
  }

  /**
   * Display the specified resource.
   */
  public function show(VitroOrder $vitroOrder)
  {
    return new VitroOrderResource($vitroOrder);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVitroOrderRequest $request, VitroOrder $vitroOrder)
  {
    $data = $request->all();
    
    if($data["advance"]) {
      $data["pending"] = $vitroOrder->total - $data["advance"];
    }

    $vitroOrder->update($data);

    return new VitroOrderResource($vitroOrder);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(VitroOrder $vitroOrder)
  {
    $vitroOrder->delete();
  }
}

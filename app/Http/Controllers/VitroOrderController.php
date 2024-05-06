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
    $vitroOrders = VitroOrder::where($queryItems)
                    ->with("orderVarieties")
                    ->orderBy("created_at", "desc");

    return new VitroOrderCollection($vitroOrders->paginate(18)->appends($request->query()));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVitroOrderRequest $request)
  {
    return new VitroOrderResource(VitroOrder::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(VitroOrder $vitroOrder)
  {
    return new VitroOrderResource($vitroOrder->loadMissing("orderVarieties"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVitroOrderRequest $request, VitroOrder $vitroOrder)
  {
    $data = $request->all();
    
    if(isset($data["advance"])) {
      $data["pending"] = $vitroOrder->total - $data["advance"];
    }

    $vitroOrder->update($data);

    return new VitroOrderResource($vitroOrder->loadMissing("orderVarieties"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(VitroOrder $vitroOrder)
  {
    $vitroOrder->orderVarieties()->delete();
    $vitroOrder->delete();
  }
}

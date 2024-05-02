<?php

namespace App\Http\Controllers;

use App\Filters\VarietyFilter;
use App\Http\Requests\StoreVarietyRequest;
use App\Http\Requests\UpdateVarietyRequest;
use App\Http\Resources\VarietyCollection;
use App\Http\Resources\VarietyResource;
use App\Models\Variety;
use Illuminate\Http\Request;

class VarietyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new VarietyFilter();
    $queryItems = $filter->transform($request);
    $varieties = Variety::where($queryItems)->get();

    return new VarietyCollection($varieties);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVarietyRequest $request)
  {
    return new VarietyResource(Variety::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(Variety $variety)
  {
    return new VarietyResource($variety);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVarietyRequest $request, Variety $variety)
  {
    $data = $request->all();

    if(isset($data["name"])) {
      $variety->orderVarieties()->update(["variety_name" => $data["name"]]);
    }

    $variety->update($data);

    return new VarietyResource($variety);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Variety $variety)
  {
    $variety->orderVarieties()->update(["variety_id" => NULL]);
    $variety->delete();
  }
}

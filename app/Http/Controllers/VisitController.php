<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Http\Resources\VisitCollection;
use App\Http\Resources\VisitResource;
use App\Models\Visit;
use Carbon\Carbon;

class VisitController extends Controller
{
  protected function getMonth() {
    $date = Carbon::now();
    $month = Carbon::parse($date);
    $month->locale("es");
    return $month->translatedFormat("F");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $visits = Visit::all();

    return new VisitCollection($visits);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVisitRequest $request)
  {
    $month = $this->getMonth();
    $find = Visit::where("month", $month)->first();

    if($find) return response()->json(["message" => "El mes ya fue creado"], 422);

    return new VisitResource(Visit::create(["month" => $this->getMonth()]));
  }

  /**
   * Display the specified resource.
   */
  public function show(Visit $visit)
  {
    return new VisitResource($visit);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVisitRequest $request, Visit $visit)
  {
    $visit->update(["counter" => $visit->counter + 1]);

    return new VisitResource($visit);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Visit $visit)
  {
    $visit->delete();
  }
}

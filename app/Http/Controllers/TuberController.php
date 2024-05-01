<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTuberRequest;
use App\Http\Requests\UpdateTuberRequest;
use App\Http\Resources\TuberCollection;
use App\Http\Resources\TuberResource;
use App\Models\Tuber;

class TuberController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tubers = Tuber::with("varieties")->get();

    return new TuberCollection($tubers);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreTuberRequest $request)
  {
    return new TuberResource(Tuber::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(Tuber $tuber)
  {
    return new TuberResource($tuber->loadMissing("varieties"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTuberRequest $request, Tuber $tuber)
  {
    $tuber->update($request->all());

    return new TuberResource($tuber->loadMissing("varieties"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tuber $tuber)
  {
    $tuber->varieties()->update(["tuber_id" => NULL]);
    $tuber->delete();
  }
}

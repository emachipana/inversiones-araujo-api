<?php

namespace App\Http\Controllers;

use App\Filters\EventFilter;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
  protected function getMonth($date) {
    $month = Carbon::parse($date);
    $month->locale("es");
    return $month->translatedFormat("F");
  }

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new EventFilter();
    $queryItems = $filter->transform($request);
    $events = Event::where($queryItems)->orderBy("date", "asc")->get();

    return new EventCollection($events);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreEventRequest $request)
  {
    $data = $request->all();
    $data["month"] = $this->getMonth($data["date"]);

    return new EventResource(Event::create($data));
  }

  /**
   * Display the specified resource.
   */
  public function show(Event $event)
  {
    return new EventResource($event);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateEventRequest $request, Event $event)
  {
    $data = $request->all();
    if(isset($data["date"])) $data["month"] = $this->getMonth($data["date"]);
    $event->update($data);

    return new EventResource($event);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Event $event)
  {
    $event->delete();
  }
}

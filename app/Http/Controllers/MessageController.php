<?php

namespace App\Http\Controllers;

use App\Filters\MessageFilter;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new MessageFilter();
    $queryItems = $filter->transform($request);
    $messages = Message::where($queryItems)->orderBy("created_at", "desc");

    return new MessageCollection($messages->paginate(10)->appends($request->all()));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreMessageRequest $request)
  {
    return new MessageResource(Message::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(Message $message)
  {
    return new MessageResource($message);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Message $message)
  {
    $message->delete();
  }
}

<?php

namespace App\Http\Controllers;

use App\Filters\ClientFilter;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new ClientFilter();
    $queryItems = $filter->transform($request);
    $clients = Client::where($queryItems)->with("user");

    return new ClientCollection($clients->paginate(12)->appends($request->query()));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreClientRequest $request)
  {
    return new ClientResource(Client::create($request->all())->loadMissing("user"));
  }

  /**
   * Display the specified resource.
   */
  public function show(Client $client)
  {
    return new ClientResource($client->loadMissing("user"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateClientRequest $request, Client $client)
  {
    $client->update($request->all());

    return new ClientResource($client->loadMissing("user"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Client $client)
  {
    $client->orders()->update(["client_id" => NULL]);
    $client->user()->delete();

    $client->delete();
  }
}

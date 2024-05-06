<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  { 
    $users = User::all();

    return new UserCollection($users);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    $data = $request->all();
    $client = Client::findOrFail($data["client_id"]);
    $data["username"] = $client->email;
    $data["password"] = Hash::make($data["password"]);

    return new UserResource(User::create($data));
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return new UserResource($user);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    $data = $request->all();
    if(isset($data["password"])) $data["password"] = Hash::make($data["password"]);
    $user->update($data);

    return new UserResource($user);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->resets()->delete();

    $user->delete();
  }
}

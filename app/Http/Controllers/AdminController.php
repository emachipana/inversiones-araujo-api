<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;

class AdminController extends Controller
{
  /**
   * Display the specified resource.
   */
  public function show(Admin $admin)
  {
    return new AdminResource($admin->loadMissing("profits"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateAdminRequest $request, Admin $admin)
  {
    $admin->update($request->all());

    return new AdminResource($admin->loadMissing("profits"));
  }
}

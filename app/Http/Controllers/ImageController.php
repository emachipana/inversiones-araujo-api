<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageCollection;
use App\Http\Resources\ImageResource;
use App\Models\Image;

class ImageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return new ImageCollection(Image::all());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreImageRequest $request)
  {
  
  }

  /**
   * Display the specified resource.
   */
  public function show(Image $image)
  {
    return new ImageResource($image);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateImageRequest $request, Image $image)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Image $image)
  {
      //
  }
}

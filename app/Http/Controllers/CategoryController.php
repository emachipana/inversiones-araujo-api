<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::with("subCategories")->get();

    return new CategoryCollection($categories);
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $category)
  {
    return new CategoryResource($category->loadMissing("subCategories"));
  }
}

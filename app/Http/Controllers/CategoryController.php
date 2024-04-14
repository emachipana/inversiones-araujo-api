<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
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

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCategoryRequest $request, Category $category)
  {
    $category->update($request->all());

    return new CategoryResource($category->loadMissing("subCategories"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->products()->update(["category_id" => NULL, "sub_category_id" => NULL]);
    $category->subCategories()->delete();

    $category->delete();
  }
}

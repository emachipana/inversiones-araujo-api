<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Resources\SubCategoryCollection;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $categoryName = $request->query("category");
    $subCategories = SubCategory::all();
    
    if($categoryName) {
      $category = Category::where("name", $categoryName)->first();

      $subCategories  = $category ? SubCategory::where("category_id", $category->id)->get() : [];
    }

    return new SubCategoryCollection($subCategories);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreSubCategoryRequest $request)
  {
      //
  }

  /**
   * Display the specified resource.
   */
  public function show(SubCategory $subCategory)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(SubCategory $subCategory)
  {
      //
  }
}

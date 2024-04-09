<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $filter = new ProductFilter();
    $queryItems = $filter->transform($request);
    $products = Product::where($queryItems)->with("productImages");

    return new ProductCollection($products->paginate(30)->appends($request->query()));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductRequest $request)
  {
    return new ProductResource(Product::create($request->all()));
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
      //
  }
}

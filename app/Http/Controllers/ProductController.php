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
    $search = $request->query("search");
    if($search) {
      $products = Product::where("name", "LIKE", "%" . $search . "%")->take(10)->get();

      return new ProductCollection($products);
    }
    $filter = new ProductFilter();
    $queryItems = $filter->transform($request);
    $products = Product::where($queryItems)
                  ->with("productImages")
                  ->orderBy("created_at", "desc");

    return new ProductCollection($products->paginate(20)->appends($request->query()));
  }

  public function randomProducts() 
  {
    $products = Product::inRandomOrder()->limit(5)->get();

    return new ProductCollection($products);
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
    return new ProductResource($product->loadMissing("productImages"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product)
  {
    $product->update($request->all());

    return new ProductResource($product->loadMissing("productImages"));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    $product->discount()->delete();
    $product->offerProducts()->delete();
    $product->productImages()->delete();
    $product->invoiceItems()->update(["product_id" => NULL]);
    $product->orderProducts()->update(["product_id" => NULL]);

    $product->delete();
  }
} 

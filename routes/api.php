<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\OrderVarietyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TuberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VarietyController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\VitroOrderController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
  "sub_categories" => SubCategoryController::class,
  "products" => ProductController::class,
  "offers" => OfferController::class,
  "images" => ImageController::class,
  "invoices" => InvoiceController::class,
  "tubers" => TuberController::class,
  "varieties" => VarietyController::class,
  "vitro_orders" => VitroOrderController::class,
  "clients" => ClientController::class,
  "users" => UserController::class,
  "events" => EventController::class,
  "orders" => OrderController::class,
  "visits" => VisitController::class
]);

Route::apiResource("categories", CategoryController::class)->only(["index", "show"]);

Route::apiResource("discounts", DiscountController::class)->except(["index", "show"]);

Route::apiResource("offer_products", OfferProductController::class)->except(["index", "show"]);

Route::apiResource("product_images", ProductImageController::class)->except(["index", "show"]);

Route::apiResource("invoice_items", InvoiceItemController::class)->except(["index", "show"]);

Route::apiResource("order_varieties", OrderVarietyController::class)->except(["index", "show"]);

Route::apiResource("admins", AdminController::class)->only(["update", "show"]);

Route::apiResource("order_products", OrderProductController::class)->except(["index", "show"]);

Route::apiResource("messages", MessageController::class)->except(["update"]);

Route::group(["prefix" => "auth"], function () {
  Route::controller(AuthController::class)->group(function () {
    Route::post("/login", "login");
    
    Route::post("/signup", "signup");
  });
});

Route::group(["prefix" => "resets"], function () {
  Route::controller(ResetController::class)->group(function () {
    Route::post("/", "store");
    
    Route::delete("/{reset}", "destroy");

    Route::post("/check/{reset}", "check");
  });
});

<?php

use App\Http\Controllers\AdminController;
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
  "categories" => CategoryController::class,
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
  "messages" => MessageController::class,
  "visits" => VisitController::class
]);

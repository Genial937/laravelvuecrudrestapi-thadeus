<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\suppliedProductsController;
use App\Http\Controllers\orderDetailsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Suppliers
Route::get('fetch_suppliers', [supplierController::class, 'index']);
Route::post('save_supplier', [supplierController::class, 'store']);
Route::get('get_supplier/{id}', [supplierController::class, 'show']);
Route::post('update_supplier/{id}', [supplierController::class, 'update']);
Route::delete('delete_supplier/{id}',[supplierController::class, 'destroy']);

// products
Route::get('fetch_products', [productController::class, 'index']);
Route::post('save_product', [productController::class, 'store']);
Route::get('get_product/{id}', [productController::class, 'show']);
Route::post('update_product/{id}', [productController::class, 'update']);
Route::delete('delete_product/{id}',[productController::class, 'destroy']);

// Orders
Route::get('fetch_orders', [orderController::class, 'index']);
Route::post('save_order', [orderController::class, 'store']);
Route::get('get_order/{id}', [orderController::class, 'show']);
Route::put('update_order/{id}', [orderController::class, 'update']);
Route::delete('delete_order/{id}',[orderController::class, 'destroy']);

// supplied products
Route::get('fetch_supplies', [suppliedProductsController::class, 'index']);
Route::post('save_supply', [suppliedProductsController::class, 'store']);
Route::get('get_supply/{id}', [suppliedProductsController::class, 'show']);
Route::delete('delete_supply/{id}',[suppliedProductsController::class, 'destroy']);

// Order details
Route::get('fetch_order_details', [orderDetailsController::class, 'index']);
Route::post('save_order_detail', [orderDetailsController::class, 'store']);
Route::get('get_order_detail/{id}', [orderDetailsController::class, 'show']);
Route::delete('delete_order_detail/{id}',[orderDetailsController::class, 'destroy']);
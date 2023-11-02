<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'getAllCustomer']);
Route::get('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'showAllCustomer']);
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'storeAllCustomer']);
Route::get('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'updateAllCustomer']);
Route::get('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroyAllCustomer']);
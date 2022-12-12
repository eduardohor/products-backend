<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
  Route::get('categories', [CategoryController::class, 'index']);
  Route::post('categories', [CategoryController::class, 'store']);

  Route::post('products', [ProductController::class, 'store']);
  Route::put('products/{id}', [ProductController::class, 'update']);
  Route::delete('products/{id}', [ProductController::class, 'destroy']);
  Route::get('products/{id}', [ProductController::class, 'show']);
  Route::get('products', [ProductController::class, 'index']);
});

<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Category API Routes
Route::apiResource('categories', ApiCategoryController::class);
// Product API Routes
Route::apiResource('products', ApiProductController::class);
// Additional route: get products by category
Route::get('categories/{categoryId}/products', [ApiProductController::class, 'getByCategory']);
Route::post('products/{id}', [ApiProductController::class, 'update']);

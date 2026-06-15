<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Category API Routes
Route::get('/categories', [ApiCategoryController::class, 'index']);
Route::post('/categories', [ApiCategoryController::class, 'store']);
Route::get('/categories/{id}', [ApiCategoryController::class, 'show']);
Route::put('/categories/{id}', [ApiCategoryController::class, 'update']);
Route::delete('/categories/{id}', [ApiCategoryController::class, 'destroy']);

// Product API Routes
Route::get('/products', [ApiProductController::class, 'index']);
Route::post('/products', [ApiProductController::class, 'store']);
Route::get('/products/{id}', [ApiProductController::class, 'show']);
Route::put('/products/{id}', [ApiProductController::class, 'update']);
Route::delete('/products/{id}', [ApiProductController::class, 'destroy']);
Route::get('/categories/{categoryId}/products', [ApiProductController::class, 'getByCategory']);

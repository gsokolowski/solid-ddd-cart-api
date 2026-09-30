<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

// prefix is api so its /api/user
Route::get('/products', [ProductController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function (Request $request) {
    return 'ping pong';
})->middleware('auth:sanctum');


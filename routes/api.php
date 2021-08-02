<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPublicController;



Route::group(['middleware' => ['cors']], function() {
    Route::post('login', [ApiController::class, 'authenticate']);
    Route::post('register', [ApiController::class, 'register']);
    Route::get('getProducts', [ProductPublicController::class, 'allProducts']);
    Route::get('product-detail/{id}', [ProductPublicController::class, 'show']);
});


Route::group(['middleware' => ['jwt.verify','cors']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::post('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});
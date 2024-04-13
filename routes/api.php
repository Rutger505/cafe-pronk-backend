<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('check', [AuthController::class, 'check']);
});


Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index']);

    Route::group(['prefix' => 'category', 'middleware' => ['auth:sanctum', 'adminOnly']], function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{category}/', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'delete']);
        Route::patch('/swap/{category1}/{category2}', [CategoryController::class, 'swap']);
    });

    Route::group(['prefix' => 'dish', 'middleware' => ['auth:sanctum', 'adminOnly']], function () {
        Route::post('/', [DishController::class, 'store']);
        Route::put('/{dish}', [DishController::class, 'update']);
        Route::delete('/{dish}', [DishController::class, 'delete']);
        Route::patch('/swap/{dish1}/{dish2}', [DishController::class, 'swap']);
    });
});

Route::prefix('contact')->group(function () {
    Route::post('/', [ContactController::class, 'store']);

    Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::delete('/{contactMessage}', [ContactController::class, 'delete']);
    });
});

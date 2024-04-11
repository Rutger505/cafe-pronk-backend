<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// MENU RELATED ROUTES
Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'all']);

    Route::prefix('category')->group(function () {
        Route::post('/{name}', [CategoryController::class, 'create']);
        Route::put('/{category}/{name}', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'delete']);
        Route::patch('/swap/{category1}/{category2}', [CategoryController::class, 'swap']);
    });

    Route::prefix('dish')->group(function () {
        Route::post('/{category}/{name}/{description}/{price}', [DishController::class, 'create']);
        Route::put('/{dish}/{name}/{description}/{price}', [DishController::class, 'update']);
        Route::delete('/{dish}', [DishController::class, 'delete']);
        Route::patch('/swap/{dish1}/{dish2}', [DishController::class, 'swap']);
    });
});

// MESSAGE RELATED ROUTES
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'all']);
    Route::post('/', [ContactController::class, 'create']);
    Route::delete('/{contactMessage}', [ContactController::class, 'delete']);
});

Route::prefix('reservation')->group(function () {
    Route::get('/', [ReservationController::class, 'all']);
    Route::post('/', [ReservationController::class, 'create']);
    Route::patch('/', [ReservationController::class, 'acceptDecline']);
});

// ADMIN RELATED ROUTES
Route::prefix('admin')->group(function () {
    Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
    Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
});

Route::prefix('auth')->group(function () {
    Route::post('/{email}/{password}', [AuthController::class, 'loginAsAdmin']);
});

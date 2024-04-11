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
        Route::post('/{name}', [CategoryController::class, 'createCategory']);
        Route::put('/{category}/{name}', [CategoryController::class, 'updateCategory']);
        Route::delete('/{category}', [CategoryController::class, 'deleteCategory']);
        Route::patch('/swap/{category1}/{category2}', [CategoryController::class, 'swapCategories']);
    });

    Route::prefix('dish')->group(function () {
        Route::post('/{category}/{name}/{description}/{price}', [DishController::class, 'createDish']);
        Route::put('/{dish}/{name}/{description}/{price}', [DishController::class, 'updateDish']);
        Route::delete('/{dish}', [DishController::class, 'deleteDish']);
        Route::patch('/swap/{dish1}/{dish2}', [DishController::class, 'swapDishes']);
    });
});

// MESSAGE RELATED ROUTES
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'all']);
    Route::post('/{name}/{businessName}/{email}/{subject}/{message}', [ContactController::class, 'create']);
    Route::delete('/{contactMessage}', [ContactController::class, 'delete']);
});

Route::prefix('reservation')->group(function () {
    Route::get('/', [ReservationController::class, 'all']);
    Route::post('/{name}/{partySize}/{date}/{message}', [ReservationController::class, 'create']);
    Route::patch('/accept/{reservation}', [ReservationController::class, 'accept']);
    Route::patch('/decline/{reservation}', [ReservationController::class, 'decline']);
});

// ADMIN RELATED ROUTES
Route::prefix('admin')->group(function () {
    Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
    Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
});

Route::prefix('auth')->group(function () {
    Route::post('/{email}/{password}', [AuthController::class, 'loginAsAdmin']);
});

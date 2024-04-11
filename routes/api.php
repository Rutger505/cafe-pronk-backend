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
    Route::get('/', [MenuController::class, 'index']);

    Route::prefix('category')->group(function () {
        Route::post('/{name}', [CategoryController::class, 'createCategory']);
        Route::put('/{category}/{name}', [CategoryController::class, 'updateCategory']);
        Route::delete('/{category}', [CategoryController::class, 'deleteCategory']);
        Route::patch('/swap/{category}/{category}', [CategoryController::class, 'swapCategories']);
    });

    Route::post('/dish/{category}/{name}/{description}/{price}', [DishController::class, 'createDish']);
    Route::put('/dish/{dish}/{name}/{description}/{price}', [DishController::class, 'updateDish']);
    Route::delete('/dish/{dish}', [DishController::class, 'deleteDish']);
    Route::patch('/dish/swap/{dish}/{dish}', [DishController::class, 'swapDishes']);
});

// MESSAGE RELATED ROUTES
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'getMessages']);
    Route::post('/', [ContactController::class, 'createMessage']);
    Route::delete('/{contactMessage}', [ContactController::class, 'deleteMessage']);
});

Route::prefix('reservation')->group(function () {
    Route::get('/', [ReservationController::class, 'getReservations']);
    Route::post('/', [ReservationController::class, 'createReservation']);
    Route::patch('/', [ReservationController::class, 'acceptDeclineReservation']);
});

// ADMIN RELATED ROUTES
Route::prefix('admin')->group(function () {
    Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
    Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
});

Route::prefix('auth')->group(function () {
    Route::post('/{email}/{password}', [AuthController::class, 'loginAsAdmin']);
});

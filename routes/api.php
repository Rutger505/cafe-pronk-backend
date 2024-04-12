<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// PUBLIC ENDPOINTS
// Get menu
Route::get('/menu', [MenuController::class, 'all']);
// Contact form
Route::post('/contact/{name}/{businessName}/{email}/{subject}/{message}', [ContactController::class, 'create']);
// Reservation form
Route::post('/reservation/{name}/{partySize}/{date}/{message}', [ReservationController::class, 'create']);

// ACCOUNT RELATED ROUTES
Route::prefix('auth')->group(function () {
    Route::post('/register/{first_name}/{last_name}/{email}/{password}', [UserController::class, 'register']);
    Route::get('/login/{email}/{password}', [AdminController::class, 'login']);
    Route::get('/check_token', [AuthController::class, 'checkToken']);
});

// ADMIN ENDPOINTS
Route::middleware('auth:sanctum')->group(function () {

    // MENU RELATED ROUTES
    Route::prefix('menu')->group(function () {
        Route::prefix('category')->group(function () {
            Route::post('/{name}', [CategoryController::class, 'create']);
            Route::put('/{category}/{name}', [CategoryController::class, 'update']);
            Route::delete('/{category}', [CategoryController::class, 'delete']);
            Route::patch('/swap/{category1}/{category2}', [CategoryController::class, 'swap']);
        });

        Route::prefix('dish')->group(function () {
            Route::post('/{category}/{name}/{description}/{price}', [DishController::class, 'create']);
            Route::put('/{dish}/{name}/{description}/{price}', [DishController::class, 'update']);
            Route::delete('/{dish}', [DishController::class, 'deleteDish']);
            Route::patch('/swap/{dish1}/{dish2}', [DishController::class, 'swap']);
        });
    });

    // MESSAGE RELATED ROUTES
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'all']);
        Route::delete('/{contactMessage}', [ContactController::class, 'delete']);
    });

    Route::prefix('reservation')->group(function () {
        Route::get('/', [ReservationController::class, 'all']);
        Route::patch('/accept/{reservation}', [ReservationController::class, 'accept']);
        Route::patch('/decline/{reservation}', [ReservationController::class, 'decline']);
    });

    // ADMIN RELATED ROUTES
    Route::prefix('admin')->group(function () {
        Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
        Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
    });
});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('check', [AuthController::class, 'check']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [AuthController::class, 'logout']);
    });
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

Route::prefix('reservations')->group(function () {
    Route::post('/', [ReservationsController::class, 'store']);

    Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
        Route::get('/', [ReservationsController::class, 'index']);
        Route::patch('/accept/{reservation}', [ReservationsController::class, 'accept']);
        Route::patch('/decline/{reservation}', [ReservationsController::class, 'decline']);
        Route::delete('/{reservation}', [ReservationsController::class, 'delete']);
    });
});



Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('', [UserController::class, 'show']);
    Route::get('/orders', [UserController::class, 'orders']);
    Route::get('/reservations', [UserController::class, 'reservations']);
    Route::get('/contact', [UserController::class, 'contactMessages']);
    Route::patch('/name', [UserController::class, 'changeName']);
    Route::patch('/email', [UserController::class, 'changeEmail']);
    Route::patch('/password', [UserController::class, 'changePassword']);
    Route::delete('/delete', [UserController::class, 'delete']);
});


Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);


    Route::prefix('admin')->group(function () {
        Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
        Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
    });
});

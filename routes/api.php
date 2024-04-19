<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [AuthController::class, 'logout']);
    });
});


Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index']);

    Route::prefix("category")->group(function () {
        Route::get('/{category}', [CategoryController::class, 'show']);

        Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
            Route::post('/', [CategoryController::class, 'store']);
            Route::put('/{category}/', [CategoryController::class, 'update']);
            Route::delete('/{category}', [CategoryController::class, 'delete']);
            Route::patch('/swap/{category1}/{category2}', [CategoryController::class, 'swap']);
        });
    });

    Route::prefix('dish')->group(function () {
        Route::get('/{dish}', [DishController::class, 'show']);

        Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
            Route::post('/', [DishController::class, 'store']);
            Route::put('/{dish}', [DishController::class, 'update']);
            Route::delete('/{dish}', [DishController::class, 'delete']);
            Route::patch('/swap/{dish1}/{dish2}', [DishController::class, 'swap']);
        });
    });
});

Route::prefix('orders')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [OrderController::class, 'store']);

    Route::middleware('adminOnly')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
    });
});

Route::prefix('contact')->group(function () {
    Route::post('/', [ContactController::class, 'store']);

    Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::patch('/read/{contact}', [ContactController::class, 'markAsRead']);
        Route::patch('/unread/{contact}', [ContactController::class, 'markAsUnRead']);
    });
});

Route::prefix('reservations')->group(function () {
    Route::post('/', [ReservationsController::class, 'store']);

    Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
        Route::get('/', [ReservationsController::class, 'index']);
        Route::patch('/accept/{reservation}', [ReservationsController::class, 'accept']);
        Route::patch('/decline/{reservation}', [ReservationsController::class, 'decline']);
    });
});

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'show']);
    Route::get('/orders', [UserController::class, 'orders']);
    Route::get('/reservations', [UserController::class, 'reservations']);
    Route::get('/contact', [UserController::class, 'contactMessages']);
    Route::patch('/name', [UserController::class, 'changeName']);
    Route::patch('/email', [UserController::class, 'changeEmail']);
    Route::patch('/password', [UserController::class, 'changePassword']);
});




Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);


    Route::prefix('admin')->group(function () {
        Route::post('/{user}', [AdminController::class, 'promoteToAdmin']);
        Route::delete('/{user}', [AdminController::class, 'demoteFromAdmin']);
    });
});

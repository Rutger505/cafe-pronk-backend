<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('check', [AuthController::class, 'check']);
});


// a path for public
Route::get('restaurants1', function() {
    return response()->json(['message' => 'You are a public user']);
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('restaurants2', function() {
        return response()->json(['message' => 'You are a logged in customer']);
    });
});


// a path for admin users
Route::group(['middleware' => ['auth:sanctum', 'adminOnly']], function () {
    Route::get('restaurants3', function() {
        return response()->json(['message' => 'You are an admin user']);
    });
});

<?php

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create/{name}/{description}/{price}', function ($name, $description, $price) {
    return Dish::create([
        'name' => $name,
        'description' => $description,
        'price' => $price,
    ]);
});

Route::get('/update/{id}/{name}/{description}/{price}', function ($id, $name, $description, $price) {
    $dish = Dish::findOrFail($id);
    $dish->name = $name;
    $dish->description = $description;
    $dish->price = $price;
    $dish->save();
    return $dish;
});


Route::get('/users', function () {
    return User::all();
});


Route::get('dish/{dish}/update', [DishController::class, 'update']);
Route::get('/delete/{dish}', [DishController::class, 'delete']);

Route::get('/user/create/{name}/{email}/{password}', function ($name, $email, $password) {
    return User::create([
        'name' => $name,
        'email' => $email,
        'password' => bcrypt($password),
    ]);
});

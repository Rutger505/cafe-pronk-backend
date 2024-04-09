<?php

use App\Models\Dish;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Dish::all();
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

Route::get('/delete/{id}', function ($id) {
    $dish = Dish::find($id);
    $dish->delete();
    return $dish;
});

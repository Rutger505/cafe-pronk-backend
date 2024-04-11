<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{

    public function update(Dish $dish, Request $request): void
    {
        $request->validate([
            'name' => "required|string|max:255",
            'description' => "required|string",
            'price' => "required|numeric",
        ]);

        $dish->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    }

    public function delete(Dish $dish): void
    {
        $dish->delete();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        Dish::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json(['message' => 'Dish created successfully'], 201);
    }

    public function update(Dish $dish, Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $dish->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json(['message' => 'Dish updated successfully']);
    }

    public function swap(Dish $dish1, Dish $dish2): JsonResponse
    {
        $temp = $dish1->position_index;
        $dish1->update([
            'position_index' => $dish2->position_index
        ]);
        $dish2->update([
            'position_index' => $temp
        ]);

        return response()->json(['message' => 'Dishes swapped successfully']);
    }

    public function delete(Dish $dish): JsonResponse
    {
        $dish->delete();

        return response()->json(['message' => 'Dish deleted successfully']);
    }
}

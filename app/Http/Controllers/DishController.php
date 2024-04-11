<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;

class DishController extends Controller
{
    public function createDish(Category $category, $name, $description, $price)
    {
        return Dish::create([
            'category_id' => $category->id,
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);
    }

    public function updateDish(Dish $dish, $name, $description, $price)
    {
        $dish->update([
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);

        return response()->json(['message' => 'Dish updated successfully']);
    }

    public function deleteDish(Dish $dish)
    {
        $dish->delete();

        return response()->json(['message' => 'Dish deleted successfully']);
    }

    public function swapDishes(Dish $dish1, Dish $dish2)
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
}

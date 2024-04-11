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
}

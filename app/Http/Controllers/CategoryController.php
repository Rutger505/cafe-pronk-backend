<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategory($name)
    {
        Category::create([
            'name' => $name
        ]);

        return response()->json(['message' => 'Category created successfully'], 201);
    }
}

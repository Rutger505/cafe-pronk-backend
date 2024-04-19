<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category): Category
    {
        return $category;
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function update(Category $category, Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Category updated successfully']);
    }

    /**
     * Swap the position index of two categories
     */
    public function swap(Category $category1, Category $category2): JsonResponse
    {
        $temp = $category1->position_index;
        $category1->update([
            'position_index' => $category2->position_index
        ]);
        $category2->update([
            'position_index' => $temp
        ]);

        return response()->json(['message' => 'Categories swapped successfully']);
    }

    public function delete(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function createCategory($name): JsonResponse
    {
        Category::create([
            'name' => $name
        ]);

        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function updateCategory(Category $category, $name): JsonResponse
    {
        $category->update([
            'name' => $name
        ]);

        return response()->json(['message' => 'Category updated successfully']);
    }

    public function deleteCategory(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function swapCategories(Category $category1, Category $category2): JsonResponse
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
}

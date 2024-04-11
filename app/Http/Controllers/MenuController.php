<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Controller
{
    public function all()
    {
        $categories = Category::with('dishes')->get();

        return response()->json([
            'categories' => $categories,
        ]);
    }
}

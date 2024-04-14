<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Starters'],
            ['name' => 'Main Courses'],
            ['name' => 'Desserts'],
            ['name' => 'Drinks'],
        ];

        // Seed categories table with dummy data
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}

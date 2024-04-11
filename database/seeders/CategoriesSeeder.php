<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define dummy data for categories
        $categories = [
            [
                'name' => 'Category 1',
                'position_index' => 1],
            [
                'name' => 'Category 2',
                'position_index' => 2
            ],
            // Add more categories as needed
        ];

        // Seed categories table with dummy data
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}

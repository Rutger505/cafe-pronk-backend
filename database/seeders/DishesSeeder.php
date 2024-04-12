<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get category IDs for association
        $categoryIds = Category::pluck('id')->toArray();


        // Define dummy data for dishes
        $dishes = [
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 1',
                'description' => 'Description for Dish 1',
                'price' => 9.99,
                'position_index' => '1',
            ],
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 2',
                'description' => 'Description for Dish 2',
                'price' => 12.99,
                'position_index' => '2',
            ],
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 3',
                'description' => 'Description for Dish 3',
                'price' => 14.99,
                'position_index' => '3',
            ],
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 4',
                'description' => 'Description for Dish 4',
                'price' => 10.99,
                'position_index' => '4',
            ],
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 5',
                'description' => 'Description for Dish 5',
                'price' => 11.99,
                'position_index' => '5',
            ],
            [
                'category_id' => $categoryIds[rand(0, count($categoryIds) - 1)],
                'name' => 'Dish 6',
                'description' => 'Description for Dish 6',
                'price' => 13.99,
                'position_index' => '6',
            ],
        ];

        // Seed dishes table with dummy data
        foreach ($dishes as $dishData) {
            Dish::create($dishData);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert dummy data into the "dishes" table
        DB::table('dishes')->insert([
            [
                'name' => 'Spaghetti Carbonara',
                'description' => 'Classic Italian pasta dish with eggs, cheese, pancetta, and black pepper.',
                'price' => 12.99,
            ],
            [
                'name' => 'Chicken Alfredo',
                'description' => 'Creamy pasta dish with chicken, garlic, and Parmesan cheese.',
                'price' => 15.99,
            ],
            // Add more dummy data as needed
        ]);
    }
}

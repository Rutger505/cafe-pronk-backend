<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                CategoriesSeeder::class,
                DishesSeeder::class,
                UsersSeeder::class,
                ContactMessagesSeeder::class,
                ReservationsSeeder::class,
                OrdersSeeder::class,
            ]
        );
    }
}

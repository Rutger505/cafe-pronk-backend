<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin'),
                'is_admin' => true,
            ],
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => bcrypt('user'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

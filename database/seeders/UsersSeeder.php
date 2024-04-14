<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ],
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => Hash::make('user'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

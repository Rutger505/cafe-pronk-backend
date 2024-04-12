<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register($first_name, $last_name, $email, $password)
    {
        return User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }

    public function loginAsAdmin($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }

        if (!$user->is_admin) {
            return response([
                'message' => 'Not an admin'
            ], 401);
        }

        return response([
            'token' => $user->createToken("authToken")->plainTextToken
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login($email, $password): JsonResponse
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Wrong credentials'
            ], 401);
        }

        if (!$user->is_admin) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'token' => $user->createToken("authToken")->plainTextToken
        ]);
    }

    public function promoteToAdmin(User $user): JsonResponse
    {
        $user->update([
            'is_admin' => true
        ]);

        return response()->json([
            'message' => 'User has been promoted to admin'
        ]);
    }

    public function demoteFromAdmin(User $user): JsonResponse
    {
        $user->update([
            'is_admin' => false
        ]);

        return response()->json([
            'message' => 'User has been demoted from admin'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): Collection
    {
        return User::all();
    }

    public function show(Request $request): User
    {
        return $request->user('sanctum');
    }

    public function orders(Request $request): Collection
    {
        return $request->user('sanctum')->orders;
    }

    public function reservations(Request $request): Collection
    {
        return $request->user('sanctum')->reservations;
    }

    public function contactMessages(Request $request): Collection
    {
        return $request->user('sanctum')->contactMessages;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string',
            'currentPassword' => 'required|string'
        ]);

        $user = $request->user('sanctum');

        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }


        $userData = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return response()->json(['message' => 'User updated']);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->user('sanctum')->delete();
        return response()->json(['message' => 'Account deleted']);
    }
}

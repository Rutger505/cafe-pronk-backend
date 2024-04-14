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

    public function changeName(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string'
        ]);

         $request->user('sanctum')->update([
            'name' => $request->name
        ]);
        return response()->json(['message' => 'Name updated']);
    }

    public function changeEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $request->user('sanctum')->update([
            'email' => $request->email
        ]);
        return response()->json(['message' => 'Email updated']);
    }

    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'newPassword' => 'required|string',
            'currentPassword' => 'required|string'
        ]);

        $user = $request->user('sanctum');

        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }

        $user->update([
            'password' => Hash::make($request->newPassword)
        ]);

        return response()->json(['message' => 'Password updated']);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->user('sanctum')->delete();
        return response()->json(['message' => 'Account deleted']);
    }
}

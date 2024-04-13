<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{


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

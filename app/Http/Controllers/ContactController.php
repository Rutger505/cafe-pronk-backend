<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): Collection
    {
        return ContactMessage::all();
    }

    public function store(Request $request): ContactMessage
    {
        $request->validate([
            'name' => 'required|string',
            'business_name' => 'nullable|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = $request->user("sanctum");

        return ContactMessage::create([
            'user_id' => $user ? $user->id : null,
            'name' => $request->name,
            'business_name' => $request->business_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
    }
}

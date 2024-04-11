<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function all()
    {
        return ContactMessage::all();
    }

    public function create($name, $businessName, $email, $subject, $message)
    {
        return ContactMessage::create([
            'name' => $name,
            'business_name' => $businessName,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]);
    }

    public function delete(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return response()->json(['message' => 'Contact message deleted']);
    }
}

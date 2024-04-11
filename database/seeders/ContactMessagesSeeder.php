<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;

class ContactMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define dummy data for contact messages
        $messages = [
            [
                'name' => 'John Doe',
                'business_name' => 'ABC Company',
                'email' => 'john@example.com',
                'message' => 'This is a test message from John Doe.',
            ],
            [
                'name' => 'Jane Smith',
                'business_name' => null,
                'email' => 'jane@example.com',
                'message' => 'This is another test message from Jane Smith.',
            ],
            [
                'name' => 'Alice Johnson',
                'business_name' => 'XYZ Corporation',
                'email' => 'example@mail.com',
                'message' => 'This is a sample message from Alice Johnson.',
            ]
        ];

        // Seed contact_messages table with dummy data
        foreach ($messages as $messageData) {
            ContactMessage::create($messageData);
        }
    }
}

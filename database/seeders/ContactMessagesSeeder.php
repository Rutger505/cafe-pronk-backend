<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

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
                'subject' => 'Test Message',
                'message' => 'This is a test message from John Doe.',
            ],
            [
                'name' => 'Jane Smith',
                'business_name' => null,
                'email' => 'jane@example.com',
                'subject' => 'Test Message',
                'message' => 'This is another test message from Jane Smith.',
            ],
            [
                'name' => 'Alice Johnson',
                'business_name' => 'XYZ Corporation',
                'email' => 'example@mail.com',
                'subject' => 'Test Message',
                'message' => 'This is a sample message from Alice Johnson.',
            ]
        ];

        // Seed contact_messages table with dummy data
        foreach ($messages as $messageData) {
            ContactMessage::create($messageData);
        }
    }
}

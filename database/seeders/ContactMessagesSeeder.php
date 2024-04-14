<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\User;
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
        $messages = [
            [
                'name' => 'Bob',
                'business_name' => 'Bob\'s Burgers',
                'email' => 'bob@email.com',
                'subject' => 'Question about the menu',
                'message' => 'Hi, I have a question about the menu. Are there going to be vegan options available?'
            ],
            [
                'name' => 'Alice',
                'email' => 'alice@email.com',
                'subject' => 'Feedback',
                'message' => 'Hi, I just wanted to say that I really enjoyed the food. Keep up the good work!'
            ],
            [
                'user_id' => User::where('email', 'user@email.com')->first()->id,
                'name' => 'User',
                'email' => 'user@email.com',
                'subject' => 'Question about reservation',
                'message' => 'Hi, I have a question about the reservation process. How do I make a reservation?'
            ]
        ];

        foreach ($messages as $messageData) {
            ContactMessage::create($messageData);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
            [
                'user_id' => User::where('email', 'user@email.com')->first()->id,
                'name' => 'John Doe',
                'party_size' => 2,
                'datetime' => '2024-04-15 18:00',
                'message' => null,
            ],
            [
                'user_id' => User::where('email', 'user@email.com')->first()->id,
                'name' => 'Jane Doe',
                'party_size' => 4,
                'datetime' => '2024-04-16 19:00',
                'message' => 'We are celebrating a birthday!'
            ],
        ];

        foreach ($reservations as $reservationData) {
            Reservation::create($reservationData);
        }
    }
}

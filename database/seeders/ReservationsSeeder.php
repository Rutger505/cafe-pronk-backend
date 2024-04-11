<?php

namespace Database\Seeders;

use App\Models\Reservation;
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
        // Define dummy data for reservations
        $reservations = [
            [
                'name' => 'John Doe',
                'party_size' => 4,
                'datetime' => '2024-04-15 18:00:00',
                'message' => 'Special occasion',
                'pending' => true,
                'accepted' => false,
            ],
            [
                'name' => 'Jane Smith',
                'party_size' => 2,
                'datetime' => '2024-04-20 19:30:00',
                'message' => 'Birthday dinner',
                'pending' => true,
                'accepted' => false,
            ],
            // Add more reservations as needed
        ];

        // Seed reservations table with dummy data
        foreach ($reservations as $reservationData) {
            Reservation::create($reservationData);
        }
    }
}

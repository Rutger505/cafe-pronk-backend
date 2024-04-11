<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

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
                'date' => '2024-04-15',
                'pending' => true,
                'accepted' => false,
            ],
            [
                'name' => 'Jane Smith',
                'party_size' => 2,
                'date' => '2024-04-20',
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

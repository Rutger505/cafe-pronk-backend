<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class ReservationController extends Controller
{
    // all
    // create
    // acceptOrDecline

    public function all()
    {
        return Reservation::all();
    }

    public function create($name, $partySize, $date, $message)
    {
        return Reservation::create([
            'name' => $name,
            'party_size' => $partySize,
            'datetime' => $date,
            'message' => $message,
        ]);
    }

    public function accept(Reservation $reservation)
    {
        $reservation->update([
            'accepted' => true,
            'pending' => false,
        ]);
        return response()->json(['message' => 'Reservation accepted']);
    }

    public function decline(Reservation $reservation)
    {
        $reservation->update([
            'accepted' => false,
            'pending' => false,
        ]);
        return response()->json(['message' => 'Reservation declined']);
    }
}

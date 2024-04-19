<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'party_size' => 'required|integer',
            'datetime' => 'required|date_format:Y-m-d H:i:s',
            'message' => 'nullable|string',
        ]);

        return Reservation::create([
            'name' => $request->name,
            'party_size' => $request->party_size,
            'datetime' => $request->datetime,
            'message' => $request->message,
        ]);
    }

    public function accept(Reservation $reservation): JsonResponse
    {
        $reservation->update([
            'accepted' => true,
            'pending' => false,
        ]);
        return response()->json(['message' => 'Reservation accepted']);
    }

    public function decline(Reservation $reservation): JsonResponse
    {
        $reservation->update([
            'accepted' => false,
            'pending' => false,
        ]);
        return response()->json(['message' => 'Reservation declined']);
    }
}

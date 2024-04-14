<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'name',
        'party_size',
        'datetime',
        'message',
        'status',
        'accepted',
        'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'business_name',
        'email',
        'subject',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

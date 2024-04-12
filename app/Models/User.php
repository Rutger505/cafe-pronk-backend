<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory;

    public $timestamps = false;

    protected $table = 'users';

    // TODO hide password but enable it to compare for logging in
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin'
    ];
}

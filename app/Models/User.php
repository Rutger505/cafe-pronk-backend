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

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password'
    ];
}

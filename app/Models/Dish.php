<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'dishes';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Set the position_index to the next available value
            $category->position_index = static::max('position_index') + 1;
        });
    }
}

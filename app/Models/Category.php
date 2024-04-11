<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Set the position_index to the next available value
            $category->position_index = static::max('position_index') + 1;
        });
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}

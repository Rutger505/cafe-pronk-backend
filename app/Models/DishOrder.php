<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishOrder extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'dish_order';

    protected $fillable = [
        'order_id',
        'dish_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

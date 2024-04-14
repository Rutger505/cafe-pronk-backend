<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishOrder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): Collection
    {
       // return all dishes with dishes field
        return Order::with('dishes')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'dishes' => 'required|array',
            'dishes.*.id' => 'required|exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $totalPrice = collect($request->dishes)->sum(function ($dishOrder) {
            return Dish::find($dishOrder['id'])->price * $dishOrder['quantity'];
        });

        $order = Order::create([
            'user_id' => $request->user('sanctum')->id,
            'total_price' => $totalPrice,
            'delivery_date' => $request->delivery_date,
        ]);

        foreach ($request->dishes as $dish) {
            DishOrder::create([
                'order_id' => $order->id,
                'dish_id' => $dish['id'],
                'quantity' => $dish['quantity'],
            ]);
        }

        return response()->json(['message' => 'Order created']);
    }
}

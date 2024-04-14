<?php

namespace Database\Seeders;

use App\Models\DishOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id' => User::where('email', 'user@email.com')->first()->id,
                'total_price' => 30.00,
                'delivery_date' => '2024-04-14 20:00:00',
            ],
        ];

        $dishOrders = [
            [
                [
                    'order_id' => 1,
                    'dish_id' => 1,
                    'quantity' => 2,
                ],
                [
                    'order_id' => 1,
                    'dish_id' => 2,
                    'quantity' => 1,
                ],
                [
                    'order_id' => 1,
                    'dish_id' => 3,
                    'quantity' => 3,
                ],
            ]
        ];


        for ($i = 0; $i < count($orders); $i++) {
           Order::create($orders[$i]);
           foreach($dishOrders[$i] as $dishOrder) {
               DishOrder::create($dishOrder);
           }
        }
    }
}

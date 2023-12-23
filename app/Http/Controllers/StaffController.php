<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodGroup;
use App\Models\FoodOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function order_food()
    {
        $context = [
            'food_groups' => FoodGroup::all(),
            'foods' => Food::all()
        ];
        return view('staff.order_food', $context);
    }

    public function ordering(Request $request)
    {
        $list_order = json_decode($request->list_order, true);
        if ($list_order) {
            $money = 0;
            foreach ($list_order as $food_id => $number) {
                $money += Food::find($food_id)->money * $number;
            }
            $order = Order::create([
                'money' => $money
            ]);

            foreach ($list_order as $food_id => $number) {
                FoodOrder::create([
                    'food_id' => $food_id,
                    'order_id' => $order->id,
                    'quantity' => $number
                ]);
            }
            return view('staff.ordered', ['money' => $money, 'order' => $order]);
        }
        return redirect('/staff/order');
    }

    public function order_list()
    {
        $data = DB::select('SELECT food_order.order_id, food_order.created_at, foods.name, food_order.quantity FROM food_order JOIN orders ON food_order.order_id = orders.id JOIN foods ON food_order.food_id = foods.id WHERE orders.is_processing = true ORDER BY food_order.order_id;');

        $orders = [];
        foreach ($data as $item) {
            $order_id = $item->order_id;
            if (!array_key_exists($order_id, $orders)) {
                $orders[$order_id] = [
                    'created_at' => '',
                    'foods' => []
                ];
            };

            $orders[$order_id]['foods'][$item->name] = $item->quantity;
        }

        return view('staff.orders', ['orders' => $orders]);
    }

    public function make_ordered($order_id)
    {
        Order::where(['id' => $order_id])->update(['is_processing' => false]);
        return redirect('/staff/orders');
    }
}

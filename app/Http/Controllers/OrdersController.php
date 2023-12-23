<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodGroup;
use Illuminate\Http\Request;
use App\Models\MyUser;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $account = $request->cookie('phone_number');
        if (isset($account)) {
            $user = MyUser::where('phone_number', $account)->first();
            if ($user->role != 'owner') return redirect('/');
        }
        $orders = Order::orderBy('created_at', 'ASC')->get();
        return view('owner.orders', compact('orders'));
    }
    public function statistics_by_month(Request $request)
    {
        $monthlyStats = DB::select('SELECT
        MONTH(created_at) AS month,
        YEAR(created_at) AS year,SUM(money) AS total_money
        FROM orders
        WHERE is_processing = 0
        GROUP BY year, month
        ORDER BY year, month;');
        return view('owner.statistics_by_month', compact('monthlyStats'));
    }
    public function statistics_by_year(Request $request)
    {
        $annualStats = DB::select('SELECT
        YEAR(created_at) AS year,
        SUM(money) AS total_money
        FROM orders
        GROUP BY year
        ORDER BY year ASC;');
        return view('owner.statistics_by_year', compact('annualStats'));
    }
}

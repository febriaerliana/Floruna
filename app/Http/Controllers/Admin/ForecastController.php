<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForecastController extends Controller
{
    public function index()
    {
        $orders = Order::whereNotNull('confirmed_at')
            ->select(DB::raw('sum(total_price) as `total`'), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->orderByDesc('created_at')
            ->groupby('year', 'month')
            ->get();
        $forecast = 0;
        if ($orders->count() > 2) {
            $total = $orders->take(3)->sum('total');
            $forecast = $total / 3;
        }
        return view('modules.dashboard.forecast.index', compact('orders', 'forecast'));
    }
}

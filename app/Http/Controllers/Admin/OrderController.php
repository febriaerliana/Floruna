<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->get();
        return view('modules.dashboard.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('modules.dashboard.order.show', compact('order'));
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $order->update([
            'confirmed_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Transaksi berhasil dikonfirmasi');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return view('modules.dashboard.users.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id != Auth::id()) {
            return abort(403);
        }
        return view('modules.dashboard.users.order.show', compact('order'));
    }

    public function upload(Request $request, $id)
    {
        if (!$request->has('img')) {
            return redirect()->back()->with('failed', 'Mohon gambar harus di isi');
        }
        $order = Order::findOrFail($id);
        $thumb = Storage::disk('public')->put('order', $request->img);
        $order->update([
            'img' => $thumb,
            'paid_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Mohon menunggu konfirmasi dari admin');
    }
}

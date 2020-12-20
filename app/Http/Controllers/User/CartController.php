<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\CartDetail;
use App\Http\Controllers\Controller;
use App\Item;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        return view('modules.dashboard.users.cart.index', compact('cart'));
    }

    public function deleteItem(Request $request)
    {
        $item = CartDetail::findOrFail($request->id);
        $item->delete();
        return redirect()->route('dashboard.user.cart.index');
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        try {
            DB::beginTransaction();
            $total = 0;
            $stocks = explode(',', $request->item_stock);
            $items = explode(',', $request->item_cart);
            foreach ($stocks as $i => $stock) {
                $item = CartDetail::find($items[$i]);
                $product = Item::find($item->item_id);
                $total += $item->item->price * $stock;
                if ($product->stock < 1) {
                    DB::rollBack();
                    return redirect()->back()->with('failed', "$product->name telah habis. mohon hapus produk terlebih dahulu");
                }
                $temp = $product->stock - $stock;
                if ($temp < 0) {
                    DB::rollBack();
                    return redirect()->back()->with('failed', "$product->name hanya memiliki stock $product->stock kg. mohon ubah stok produk terlebih dahulu");
                }
                $product->update([
                    'stock' => $temp
                ]);
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
                'address' => $request->address
            ]);

            foreach ($stocks as $i => $stock) {
                $item = CartDetail::find($items[$i]);
                OrderItem::create([
                    'item_id' => $item->item_id,
                    'order_id' => $order->id,
                    'total' => $stock,
                ]);
                $item->delete();
            }
//            $cart = Cart::where('user_id', Auth::id())->first();
//            if (count($items) === $cart->details->count()) {
//                $cart->delete();
//            }

            DB::commit();
            return redirect()->route('dashboard.user.order.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}

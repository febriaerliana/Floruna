<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Item::orderByDesc('created_at')->get();
        return view('modules.dashboard.users.product.index', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $product = Item::findOrFail($request->id);
        if ($product->stock < 1) {
            return redirect()->back();
        }
        $cart = Cart::where('user_id', Auth::id())->first();
        if (is_null($cart)) {
            $cart = Cart::create([
                'user_id' => Auth::id()
            ]);
        }
        $id = $request->id;
        $check = $cart->details->filter(function ($q) use ($id) {
            if ($q->item_id == $id) {
                return $q;
            }
        })->count();
        if ($check == 0) {
            $cart->details()->create([
                'cart_id' => $cart->id,
                'item_id' => $request->id,
                'total' => 1
            ]);
        }

        return redirect()->route('dashboard.user.cart.index');
    }
}

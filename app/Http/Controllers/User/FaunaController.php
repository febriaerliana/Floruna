<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FaunaController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 1)->orderByDesc('created_at')->get();
        return view('modules.dashboard.users.fauna.index', compact('products'));
    }

    public function download($id)
    {
        $product = Product::findOrFail($id);
        return view('modules.dashboard.fauna.print', compact('product'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if ($product->type == 0) {
            return redirect()->route('dashboard.user.flora.show', $product->id);
        }
        return view('modules.dashboard.users.fauna.show', compact('product'));
    }
}

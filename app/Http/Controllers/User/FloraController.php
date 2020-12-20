<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FloraController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 0)->orderByDesc('created_at')->get();
        return view('modules.dashboard.users.flora.index', compact('products'));
    }

    public function download($id)
    {
        $product = Product::findOrFail($id);
        return view('modules.dashboard.flora.print', compact('product'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if ($product->type == 1) {
            return redirect()->route('dashboard.user.fauna.show', $product->id);
        }
        return view('modules.dashboard.users.flora.show', compact('product'));
    }
}

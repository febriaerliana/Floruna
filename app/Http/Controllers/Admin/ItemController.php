<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $products = Item::orderByDesc('created_at')->get();
        return view('modules.dashboard.product.index', compact('products'));
    }

    public function create()
    {
        return view('modules.dashboard.product.create');
    }

    public function store(Request $request)
    {
        $thumb = Storage::disk('public')->put('product', $request->img);
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'img' => $thumb
        ]);
        return redirect()->route('dashboard.admin.product.index');
    }

    public function edit($id)
    {
        $product = Item::findOrFail($id);
        return view('modules.dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Item::find($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        if ($request->has('img')) {
            $delete = Storage::disk('public')->delete($product->img);
            $thumb = Storage::disk('public')->put('flora', $request->img);
            $product->update([
                'img' => $thumb,
            ]);
        }

        return redirect()->route('dashboard.admin.product.index');
    }

    public function destroy($id)
    {
        $product = Item::find($id);
        $delete = Storage::disk('public')->delete($product->img);
        $product->delete();
        return redirect()->route('dashboard.admin.product.index');
    }
}

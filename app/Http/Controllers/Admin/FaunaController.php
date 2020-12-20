<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaunaController extends Controller
{
    public function index()
    {
        $products = Product::where('type',1)->orderByDesc('created_at')->get();
        return view('modules.dashboard.fauna.index', compact('products'));
    }

    public function create()
    {
        return view('modules.dashboard.fauna.create');
    }

    public function store(Request $request)
    {
        $thumb = Storage::disk('public')->put('fauna', $request->image);
        Product::create([
            'type' => 1,
            'name' => $request->name,
            'species' => $request->species,
            'latin_name' => $request->latin_name,
            'color' => $request->color,
            'characteristic' => $request->characteristic,
            'habitat' => $request->habitat,
            'shape' => $request->shape,
            'total' => $request->total,
            'status' => $request->status,
            'img' => $thumb
        ]);
        return redirect()->route('dashboard.admin.fauna.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('modules.dashboard.fauna.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'species' => $request->species,
            'latin_name' => $request->latin_name,
            'color' => $request->color,
            'characteristic' => $request->characteristic,
            'habitat' => $request->habitat,
            'shape' => $request->shape,
            'total' => $request->total,
            'status' => $request->status,
        ]);

        if ($request->has('image')) {
            $delete = Storage::disk('public')->delete($product->img);
            $thumb = Storage::disk('public')->put('fauna', $request->image);
            $product->update([
                'img' => $thumb,
            ]);
        }
        return redirect()->route('dashboard.admin.fauna.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $delete = Storage::disk('public')->delete($product->img);
        $product->delete();
        return redirect()->route('dashboard.admin.fauna.index');
    }

    public function download($id)
    {
        $product = Product::findOrFail($id);
        return view('modules.dashboard.fauna.print', compact('product'));
    }
}

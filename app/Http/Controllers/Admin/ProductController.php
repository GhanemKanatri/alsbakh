<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url'   => 'required|url',
            'brand'       => 'nullable|string|max:100',
            'origin'      => 'nullable|string|max:100',
            'slug'        => 'required|string|unique:products,slug',
            'is_featured' => 'boolean',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        Product::create($data);

        return redirect('/admin/products')->with('success', 'Product added successfully.');
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url'   => 'required|url',
            'brand'       => 'nullable|string|max:100',
            'origin'      => 'nullable|string|max:100',
            'slug'        => 'required|string|unique:products,slug,' . $id,
            'is_featured' => 'boolean',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        $product->update($data);

        return redirect('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function destroy(int $id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/products')->with('success', 'Product deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(3);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'price' => str_replace('.', '', $request->price),
        ]);

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required'],
            'image' => ['image', 'mimes:png,jpg'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');

            $validated['image'] = $path;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->merge([
            'price' => str_replace('.', '', $request->price),
        ]);

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Update Product Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

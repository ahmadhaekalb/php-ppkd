<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manajemen Produk';
        $products = Product::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk";
        $categories = Category::all();
        return view('admin.product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:categories,slug,',
            'price' => 'nullable|numeric|min:0',
            'price_art_cartoon' => 'nullable|numeric|min:0',
            'price_art_paper' => 'nullable|numeric|min:0',
            'price_hvs' => 'nullable|numeric|min:0',
            'price_doft' => 'nullable|numeric|min:0',
            'price_glossy' => 'nullable|numeric|min:0',
            'cutting_price' => 'nullable|numeric|min:0',
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'price_art_cartoon' => $request->price_art_cartoon,
            'price_art_paper' => $request->price_art_paper,
            'price_hvs' => $request->price_hvs,
            'price_doft' => $request->price_doft,
            'price_glossy' => $request->price_glossy,
            'cutting_price' => $request->cutting_price,
            'brief_description' => $request->brief_description,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil ditambahkan.');
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
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di storage
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request; // <-- Pastikan baris ini ada di atas!

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $sizes = Size::all();

        $query = Product::with(['category', 'size'])->where('status', 'available');

        // 1. Filter Kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // 2. Filter Pencarian Teks
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%');
            });
        }

        // 3. Filter Ukuran (Size)
        if ($request->filled('size')) {
            $query->whereHas('size', function ($q) use ($request) {
                $q->where('name', $request->size);
            });
        }

        // 4. Filter Nuansa Warna (mencari di nama atau deskripsi produk)
        if ($request->filled('color')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->color . '%')
                  ->orWhere('description', 'like', '%' . $request->color . '%');
            });
        }

        // 5. Filter Standar Kondisi Vintage
        // 5. Filter Standar Kondisi Vintage
        if ($request->filled('condition')) {
            if ($request->condition === 'like_new') {
                $query->where('badge', 'Like New');
            } elseif ($request->condition === 'rare_find') {
                $query->where('badge', 'Rare Find');
            } elseif ($request->condition === 'vintage') {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%Vintage%')
                      ->orWhere('description', 'like', '%vintage%')
                      ->orWhere('condition', 'like', '%8.%');
                });
            }
        }

        $products = $query->latest()->get();

        return view('product.index', compact('products', 'categories', 'sizes'));
    }
}
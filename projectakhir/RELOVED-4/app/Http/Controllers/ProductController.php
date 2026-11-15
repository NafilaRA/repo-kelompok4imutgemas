<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
       $query = Product::with(['category', 'size']);

    // Filter berdasarkan Pencarian (Search)
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan Kategori
    if ($request->filled('category')) {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    // Filter berdasarkan Ukuran (Size)
    if ($request->filled('size')) {
        $query->whereHas('size', function($q) use ($request) {
            $q->where('name', $request->size);
        });
    }

    // Filter berdasarkan Kondisi
    if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
    }

    $products = $query->get();
    $categories = Category::all();

    return view('product.index', compact('products', 'categories'));
    }
}
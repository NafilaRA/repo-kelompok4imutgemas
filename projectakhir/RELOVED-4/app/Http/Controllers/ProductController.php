<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        if (auth()->user()?->role !== 'penjual') {
            abort(403, 'Halaman ini khusus penjual.');
        }

        $categories = Category::all();
        $sizes = Size::all();

        return view('product.create', compact('categories', 'sizes'));
    }

    public function store(Request $request)
    {
        if (auth()->user()?->role !== 'penjual') {
            abort(403, 'Halaman ini khusus penjual.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'condition' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'size_id' => 'nullable|exists:sizes,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $imagePath = 'images/products/' . $filename;
        }

        $code = 'RLV-' . strtoupper(Str::random(5));

        Product::create([
            'code' => $code,
            'name' => $validated['name'],
            'price' => $validated['price'],
            'condition' => $validated['condition'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'size_id' => $validated['size_id'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'status' => 'available',
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

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
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('code', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('badge', 'like', '%' . $keyword . '%')
                ->orWhereHas('category', function ($catQuery) use ($keyword) {
                    $catQuery->where('name', 'like', '%' . $keyword . '%')
                            ->orWhere('slug', 'like', '%' . $keyword . '%');
                });
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


    public function show($code)
    {
        $product = Product::where('code', $code)->firstOrFail();

        return view('product.show', compact('product'));
    }
}
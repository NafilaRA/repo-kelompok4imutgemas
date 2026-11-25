<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Ambil item keranjang milik user yang sedang login beserta relasi produknya
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function store(Product $product)
    {
        // Cek apakah produk sudah ada di keranjang user agar tidak dobel (karena 1 of 1)
        $exists = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

        // Setelah ditambahkan, langsung arahkan ke halaman keranjang (atau gunakan back() jika ingin tetap di beranda)
        return redirect()->route('cart.index')->with('success', 'Item berhasil masuk keranjang!');
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id === Auth::id()) {
            $cart->delete();
        }
        return back();
    }

    public function destroySelected(Request $request)
{
    $ids = $request->input('ids', []);

    if (!empty($ids)) {
        Cart::where('user_id', Auth::id())
            ->whereIn('id', $ids)
            ->delete();
    }

    return redirect()->route('cart.index')->with('success', 'Item terpilih berhasil dihapus!');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Daftar riwayat pesanan milik user yang sedang login
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // Proses checkout dari keranjang ke pesanan
    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:1000',
        ]);

        // Sesuaikan nama model keranjang jika di project kalian berbeda
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kamu masih kosong!');
        }

        $order = null;

        DB::transaction(function () use ($request, $carts, &$order) {
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->price;
            });

            $order = Order::create([
                'user_id' => Auth::id(),
                'invoice_number' => 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(5)),
                'total_price' => $totalPrice,
                'payment_status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'shipping_status' => 'processing',
            ]);

            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->product->price,
                ]);
            }

            // Kosongkan keranjang user setelah berhasil membuat pesanan
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran dan unggah bukti.');
    }

    // Detail satu pesanan
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    // Unggah bukti transfer / screenshot QRIS
    public function uploadProof(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        $order->update([
            'payment_proof' => $path,
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function complete($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        $order->update([
            'shipping_status' => 'completed',
        ]);

        return redirect()->back()->with('success', 'Pesanan dikonfirmasi telah diterima!');
    }
}
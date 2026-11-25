<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        // 'quantity', // aktifkan hanya jika kolom 'quantity' benar-benar ada di tabel order_items
        'price', // Harga produk saat dibeli
    ];

    // Relasi: Setiap item pesanan milik satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: Setiap item pesanan merujuk ke satu Product tertentu
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
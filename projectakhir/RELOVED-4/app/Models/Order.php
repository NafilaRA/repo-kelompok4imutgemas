<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'total_price',
        'payment_status',
        'payment_proof',
        'shipping_address',
        'shipping_status',
        'tracking_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu pesanan memiliki banyak item produk (Order Item)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_phone',
        'shipping_address',
        'total_price',
        'status', // Contoh: pending, processing, completed, cancelled
    ];

    // Relasi: Satu pesanan memiliki banyak item produk (Order Item)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

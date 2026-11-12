<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'category_id',
        'size_id',
        'condition',
        'description',
        'price',
        'original_price',
        'stock',
        'image',
        'badge',
        'status',
    ];

    // Relasi: Produk milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Produk milik satu ukuran
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
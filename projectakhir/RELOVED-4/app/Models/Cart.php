<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini diisi secara massal (Mass Assignment)
    protected $guarded = ['id'];

    /**
     * Relasi ke Model User (Pemilik keranjang)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Model Product (Barang thrift yang dimasukkan ke keranjang)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
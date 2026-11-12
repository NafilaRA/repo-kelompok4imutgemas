<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Halaman utama menampilkan daftar produk thrifting
Route::get('/', [ProductController::class, 'index'])->name('product.index');
// Halaman detail saat produk diklik
Route::get('/product/{code}', [ProductController::class, 'show'])->name('product.show');
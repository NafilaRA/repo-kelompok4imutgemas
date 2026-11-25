<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman utama menampilkan daftar produk thrifting
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// Rute khusus Penjual / Admin
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

// Halaman detail saat produk diklik
Route::get('/product/{code}', [ProductController::class, 'show'])->name('product.show');

// Route Autentikasi (Login, Register & Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/signup', [AuthController::class, 'showRegister'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Halaman Syarat & Ketentuan / Kebijakan Privasi
Route::get('/terms', function () {
    return view('Auth.term');
})->name('terms');

// Rute Lupa Kata Sandi (OTP)
Route::get('/lupa-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/lupa-password/kirim-otp', [ForgotPasswordController::class, 'sendOtp'])->name('password.otp.send');
Route::post('/lupa-password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.otp.update');

// Rute khusus user yang sudah login
Route::middleware('auth')->group(function () {
    // Halaman Pengaturan Akun
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    // Keranjang Belanja
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/tambah/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/keranjang/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/keranjang/hapus-terpilih', [CartController::class, 'destroySelected'])->name('cart.destroySelected');

    // Checkout QRIS
    Route::get('/checkout/qris', function () {
        return view('checkout.qris');
    })->name('checkout.qris');
});


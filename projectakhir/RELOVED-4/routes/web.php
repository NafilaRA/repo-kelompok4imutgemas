<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman utama menampilkan daftar produk thrifting
Route::get('/', [ProductController::class, 'index'])->name('product.index');
// Halaman detail saat produk diklik
Route::get('/product/{code}', [ProductController::class, 'show'])->name('product.show');
use App\Http\Controllers\AuthController;

// Route Autentikasi (Login & Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route Autentikasi (Login & Register)
Route::get('/signup', [AuthController::class, 'showRegister'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route Halaman Syarat & Ketentuan / Kebijakan Privasi
Route::get('/terms', function () {
    return view('Auth.term');
})->name('terms');
use App\Http\Controllers\Auth\ForgotPasswordController;

// Rute Lupa Kata Sandi (OTP)
Route::get('/lupa-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/lupa-password/kirim-otp', [ForgotPasswordController::class, 'sendOtp'])->name('password.otp.send');
Route::post('/lupa-password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.otp.update');
// Halaman Pengaturan Akun (Hanya bisa diakses jika sudah login)
Route::get('/profile', function () {
    return view('profile'); // Sesuaikan nama foldernya jika ditaruh di dalam subfolder, misal: view('profile.account')
})->middleware('auth')->name('profile');
// Rute khusus Penjual / Admin
Route::middleware(['auth', 'penjual'])->group(function () {
    // Ganti dengan rute tambah/edit produk milik kalian di project Reloved
    Route::get('/produk/tambah', [App\Http\Controllers\ProductController::class, 'create'])->name('produk.create');
    Route::post('/produk/simpan', [App\Http\Controllers\ProductController::class, 'store'])->name('produk.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/tambah/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/keranjang/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/keranjang/hapus-terpilih', [CartController::class, 'destroySelected'])->name('cart.destroySelected');
});
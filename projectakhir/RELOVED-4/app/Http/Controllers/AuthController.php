<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses data form login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi ya!',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi tidak boleh kosong.',
        ]);

        // Coba proses autentikasi Laravel
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('product.index'))
                             ->with('success', 'Selamat datang kembali di Reloved!');
        }

        // Jika email atau password salah
        return back()->withErrors([
            'email' => 'Email atau kata sandi yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    // Proses keluar akun (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('product.index');
    }

    // Menampilkan halaman pendaftaran (Sign Up)
    public function showRegister()
    {
        return view('auth.signup');
    }

    // Memproses data form pendaftaran akun baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'phone.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'email.required' => 'Email aktif wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar, silakan gunakan email lain atau masuk.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'terms.accepted' => 'Kamu harus menyetujui Syarat & Ketentuan terlebih dahulu.',
        ]);

        // Simpan user baru ke database
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            // Jika kolom phone belum ada di migrasi users bawaan, kamu bisa mengabaikannya atau menambahkannya nanti
        ]);

        // Login-kan otomatis setelah daftar
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect()->route('product.index')
                         ->with('success', 'Akun berhasil dibuat! Selamat bergabung di Reloved Club.');
    }
}
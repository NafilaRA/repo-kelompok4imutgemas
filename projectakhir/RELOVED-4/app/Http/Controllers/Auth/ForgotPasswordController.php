<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class ForgotPasswordController extends Controller
{
    // 1. Menampilkan halaman Lupa Kata Sandi
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // 2. Mengirim / Membuat Kode OTP 6 Digit (Langkah 1)
    public function sendOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
        ], [
            'identifier.required' => 'Email atau nomor WhatsApp wajib diisi.',
        ]);

        // Cari user berdasarkan email (atau no_hp jika kolomnya ada di tabel users)
        $user = User::where('email', $request->identifier)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['identifier' => 'Akun dengan email tersebut tidak ditemukan.']);
        }

        // Generate 6 digit angka acak
        $otp = rand(100000, 999999);

        // Simpan OTP di cache selama 10 menit
        Cache::put('otp_reset_' . $user->email, $otp, now()->addMinutes(10));

        // Kembalikan ke halaman dengan notifikasi sukses + kode OTP (untuk simulasi/testing lokal)
        return back()
            ->with('reset_identifier', $user->email)
            ->with('status', "Kode verifikasi 6 digit berhasil dikirim! (Kode simulasi Anda: {$otp})");
    }

    // 3. Verifikasi OTP & Simpan Kata Sandi Baru (Langkah 2)
    public function resetPassword(Request $request)
    {
        $request->validate([
            'identifier' => 'required|email',
            'otp' => 'required|array|size:6',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'identifier.required' => 'Silakan masukkan email Anda di Langkah 1 terlebih dahulu.',
            'otp.required' => 'Kode OTP 6 digit wajib diisi lengkap.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        // Gabungkan array 6 kotak input menjadi 1 string 6 digit
        $inputOtp = implode('', $request->otp);
        $cachedOtp = Cache::get('otp_reset_' . $request->identifier);

        if (!$cachedOtp || $inputOtp != $cachedOtp) {
            return back()
                ->with('reset_identifier', $request->identifier)
                ->withErrors(['otp' => 'Kode OTP salah atau sudah kedaluwarsa. Silakan kirim ulang kode.']);
        }

        // Update password user di database
        $user = User::where('email', $request->identifier)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            // Hapus OTP dari cache setelah berhasil dipakai
            Cache::forget('otp_reset_' . $request->identifier);
        }

        return redirect()->route('login')->with('status', 'Kata sandi berhasil diperbarui! Silakan masuk dengan sandi baru.');
    }
}
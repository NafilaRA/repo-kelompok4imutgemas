<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPenjual
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN role-nya adalah 'penjual'
        if (Auth::check() && Auth::user()->role === 'penjual') {
            return $next($request);
        }

        // Jika pembeli mencoba akses URL upload, kembalikan ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Akses ditolak! Halaman ini khusus untuk Penjual.');
    }
}

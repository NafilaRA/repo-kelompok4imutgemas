<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun - Reloved</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FFF9FB;
        }
        .font-serif-title {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="text-[#5C164E] min-h-screen flex flex-col justify-between pb-10">

    <!-- Top Navigation Bar -->
    <header class="bg-[#FFF9FB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('product.index') }}" class="w-8 h-8 rounded-full hover:bg-pink-100 flex items-center justify-center text-[#5C164E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="font-serif-title text-lg font-extrabold text-[#5C164E]">Masuk ke Akun</h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('product.index') }}" title="Beranda" class="w-9 h-9 rounded-full hover:bg-pink-100 flex items-center justify-center text-[#5C164E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl w-full mx-auto px-4 sm:px-6 pt-8">
        
        <!-- Hero Greeting & Visual Cards -->
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 bg-[#5C164E] text-white text-[11px] font-bold px-4 py-1.5 rounded-full shadow-sm mb-4">
                <span>🌸 Reloved Club</span>
                <span class="text-pink-400">•</span>
                <span class="text-pink-300">Vol. 24</span>
            </span>

            <h2 class="font-serif-title text-2xl sm:text-4xl font-extrabold text-[#5C164E] mb-2">
                Selamat Datang, Relovers! ✨
            </h2>
            <p class="text-xs sm:text-sm text-[#7A356B] max-w-md mx-auto leading-relaxed">
                Temukan busana vintage &amp; preloved 1-of-1 impianmu dengan kurasi higienis terbaik di <strong class="font-extrabold">Reloved</strong>.
            </p>

            <!-- 3 Mini Overlapping Cards Illustration -->
            <div class="flex items-center justify-center mt-6 mb-2">
                <div class="w-12 h-14 rounded-xl bg-amber-100 border-2 border-white shadow-md overflow-hidden -rotate-12 -mr-2">
                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=150&q=80" alt="Thrift 1" class="w-full h-full object-cover opacity-80">
                </div>
                <div class="w-16 h-20 rounded-2xl bg-pink-100 border-2 border-pink-400 shadow-lg overflow-hidden z-10">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=200&q=80" alt="Thrift Main" class="w-full h-full object-cover">
                </div>
                <div class="w-12 h-14 rounded-xl bg-stone-200 border-2 border-white shadow-md overflow-hidden rotate-12 -ml-2">
                    <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=150&q=80" alt="Thrift 3" class="w-full h-full object-cover opacity-80">
                </div>
            </div>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 mb-7">
            
            <!-- Alert Error / Sukses -->
            @if ($errors->any())
                <div class="mb-5 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Input Email / No HP -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="email" class="text-xs font-extrabold text-[#5C164E]">Email atau No. Handphone</label>
                        <span class="text-[11px] font-medium text-[#9D5C8F]">Wajib diisi</span>
                    </div>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <span class="text-[#5C164E] font-bold text-sm mr-3">@</span>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="contoh: nadia@gmail.com / 0812xxx"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                    </div>
                </div>

                <!-- Input Kata Sandi -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="text-xs font-extrabold text-[#5C164E]">Kata Sandi</label>
                        <a href="{{ route('password.request') }}" class="text-[11px] font-bold text-[#FF2E93] hover:underline">Lupa Kata Sandi?</a>
                    </div>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <svg class="w-4 h-4 text-[#5C164E] mr-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <input type="password" id="password" name="password" required
                            placeholder="••••••••"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                        
                        <!-- Tombol Mata (Show/Hide Password) -->
                        <button type="button" onclick="togglePassword()" class="ml-2 text-[#5C164E] hover:text-[#FF2E93] focus:outline-none">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2.5 pt-1">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded border-pink-300 text-[#FF2E93] focus:ring-[#FF2E93]">
                    <label for="remember" class="text-xs font-medium text-[#5C164E] cursor-pointer">
                        Ingat saya di perangkat ini (30 hari)
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 rounded-full bg-gradient-to-r from-[#FF2E93] to-[#FF47A1] hover:opacity-95 text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-pink-200 transition flex items-center justify-center gap-2 cursor-pointer">
                    <span>Masuk Sekarang</span>
                    <span>&rarr;</span>
                </button>
            </form>

            <!-- Link Daftar -->
            <p class="text-center text-xs font-medium text-[#5C164E] mt-6">
                Belum punya akun? <a href="{{ route('signup') }}" class="font-extrabold text-[#FF2E93] hover:underline">Daftar Akun</a>
            </p>
        </div>

        <!-- Footer Security Badge & Skip Link -->
        <div class="text-center space-y-4">
            <div class="inline-flex items-center gap-2.5 bg-[#5C164E] text-white text-[11px] font-bold px-5 py-2 rounded-full shadow-sm">
                <span class="flex items-center gap-1 text-amber-300">
                    🛡️ <span class="text-white">Enkripsi 256-Bit</span>
                </span>
                <span class="text-pink-400">•</span>
                <span class="flex items-center gap-1 text-amber-300">
                    🍃 <span class="text-white">100% Curated &amp; Clean</span>
                </span>
            </div>

            <div>
                <a href="{{ route('product.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#5C164E] hover:text-[#FF2E93] transition">
                    <span>Nanti saja, jelajahi katalog dulu</span>
                    <span>&rsaquo;</span>
                </a>
            </div>
        </div>

    </main>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru - Reloved</title>
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
                <a href="{{ route('login') }}" class="w-8 h-8 rounded-full hover:bg-pink-100 flex items-center justify-center text-[#5C164E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="font-serif-title text-lg font-extrabold text-[#5C164E]">Masuk / Reloved</h1>
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
    <main class="max-w-3xl w-full mx-auto px-4 sm:px-6 pt-6">
        
        <!-- Banner Kuning Pastel: Reloved Club -->
        <div class="rounded-3xl bg-[#FEF9C3] border border-amber-200/80 p-6 sm:p-8 text-center mb-6 shadow-sm">
            <span class="inline-flex items-center gap-1.5 bg-[#F472B6] text-white text-[11px] font-bold px-4 py-1.5 rounded-full shadow-sm mb-3">
                <span>🌸</span>
                <span>RELOVED CLUB • BERGABUNG SEKARANG</span>
            </span>

            <h2 class="font-serif-title text-2xl sm:text-3xl font-extrabold text-[#5C164E] mb-2">
                Daftar Akun Baru ✨
            </h2>
            <p class="text-xs sm:text-sm text-[#7A356B] max-w-lg mx-auto leading-relaxed mb-4">
                Dapatkan akses berburu 1-of-1 thrift gems terbaik dan paling dicari setiap minggunya di <strong class="font-extrabold">Reloved</strong>.
            </p>

            <!-- Social Proof (Avatars & Text) -->
            <div class="flex items-center justify-center gap-2">
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://api.dicebear.com/7.x/avataaars/svg?seed=User1" alt="User">
                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://api.dicebear.com/7.x/avataaars/svg?seed=User2" alt="User">
                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://api.dicebear.com/7.x/avataaars/svg?seed=User3" alt="User">
                </div>
                <span class="text-[11px] font-extrabold text-[#5C164E]">12.4k+ pencinta vintage telah bergabung</span>
            </div>
        </div>

        <!-- Box Voucher Diskon Eksklusif -->
        <div class="bg-[#FEF2F6] border border-pink-200/80 rounded-2xl px-4 py-3.5 flex items-center gap-3.5 mb-6 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-pink-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                🎁
            </div>
            <div>
                <h4 class="text-xs font-extrabold text-[#5C164E]">KEUNTUNGAN EKSKLUSIF</h4>
                <p class="text-[11px] text-[#7A356B]">Voucher Diskon Thrift Rp 25.000 + Early Drops. Prioritas 15 menit sebelum katalog umum dibuka!</p>
            </div>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 mb-7">
            
            @if ($errors->any())
                <div class="mb-5 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('signup.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-extrabold text-[#5C164E] mb-2">Nama Lengkap</label>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            placeholder="cth: Nadia Salsabila"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                    </div>
                </div>

                <!-- Nomor WhatsApp / HP dengan Pilihan Kode Negara -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="phone" class="text-xs font-extrabold text-[#5C164E]">Nomor WhatsApp / HP</label>
                        <span class="text-[10px] font-bold bg-pink-100 text-pink-700 px-2.5 py-0.5 rounded-full">Untuk notif drop kilat</span>
                    </div>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-2 py-1.5 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <!-- Dropdown Pilihan Kode Negara -->
                        <select name="country_code" class="bg-pink-200/60 text-[#5C164E] text-xs font-extrabold px-2.5 py-1.5 rounded-xl focus:outline-none cursor-pointer border-none mr-2">
                            <option value="+62">🇮🇩 +62</option>
                            <option value="+60">🇲🇾 +60</option>
                            <option value="+65">🇸🇬 +65</option>
                            <option value="+66">🇹🇭 +66</option>
                            <option value="+84">🇻🇳 +84</option>
                            <option value="+63">🇵🇭 +63</option>
                            <option value="+1">🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+81">🇯🇵 +81</option>
                            <option value="+82">🇰🇷 +82</option>
                        </select>

                        <!-- Input Nomor HP -->
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                            placeholder="81234567890"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none pr-3">
                    </div>
                </div>

                <!-- Email Aktif -->
                <div>
                    <label for="email" class="block text-xs font-extrabold text-[#5C164E] mb-2">Email Aktif</label>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="nama@email.com"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                    </div>
                </div>

                <!-- Kata Sandi Baru -->
                <div>
                    <label for="password" class="block text-xs font-extrabold text-[#5C164E] mb-2">Kata Sandi Baru</label>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <input type="password" id="password" name="password" required
                            placeholder="Minimal 8 karakter manis"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                        
                        <button type="button" onclick="togglePass('password')" class="ml-2 text-[#5C164E] hover:text-[#FF2E93] focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Bagian teks label di atas garis -->
                    <div class="flex justify-between items-center text-xs mt-2 mb-1">
                        <span>Kekuatan Sandi:</span>
                        <span id="reg-strength-text">Belum diisi</span>
                    </div>

                    <!-- Bagian 3 garis bar di bawahnya -->
                    <div class="grid grid-cols-3 gap-2">
                        <div id="reg-bar-1" class="h-1 rounded-full bg-gray-200 transition-colors duration-300"></div>
                        <div id="reg-bar-2" class="h-1 rounded-full bg-gray-200 transition-colors duration-300"></div>
                        <div id="reg-bar-3" class="h-1 rounded-full bg-gray-200 transition-colors duration-300"></div>
                    </div>
                </div>

                <!-- Konfirmasi Kata Sandi -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-extrabold text-[#5C164E] mb-2">Konfirmasi Kata Sandi</label>
                    <div class="relative flex items-center bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 focus-within:ring-2 focus-within:ring-[#FF2E93] focus-within:bg-white transition">
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder="Ulangi kata sandi di atas"
                            class="w-full bg-transparent text-xs sm:text-sm text-[#5C164E] placeholder-pink-300 focus:outline-none">
                        
                        <button type="button" onclick="togglePass('password_confirmation')" class="ml-2 text-[#5C164E] hover:text-[#FF2E93] focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Checkbox Syarat & Ketentuan -->
                <div class="flex items-center gap-2.5 pt-1">
                    <input type="checkbox" id="terms" name="terms" required class="w-4 h-4 rounded border-pink-300 text-[#FF2E93] focus:ring-[#FF2E93]">
                    <label for="terms" class="text-xs font-medium text-[#5C164E] cursor-pointer">
                        Saya setuju dengan <a href="{{ route('terms') }}" target="_blank" class="text-[#FF2E93] font-bold underline">Syarat &amp; Ketentuan</a> serta <a href="{{ route('terms') }}" target="_blank" class="text-[#FF2E93] font-bold underline">Kebijakan Privasi</a> Reloved.
                    </label>
                </div>

                <!-- Tombol Daftar Sekarang -->
                <button type="submit" class="w-full py-3.5 rounded-full bg-gradient-to-r from-[#FF2E93] to-[#FF47A1] hover:opacity-95 text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-pink-200 transition flex items-center justify-center gap-2 cursor-pointer">
                    <span>Daftar Sekarang</span>
                    <span>&rarr;</span>
                </button>
            </form>

            <!-- Link Masuk jika sudah punya akun -->
            <p class="text-center text-xs font-medium text-[#5C164E] mt-6">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-extrabold text-[#FF2E93] hover:underline">Masuk di sini ✨</a>
            </p>
        </div>

        <!-- Banner Kuning Bawah: Quality & Eco-Friendly -->
        <div class="rounded-2xl bg-[#FEF9C3] border border-amber-200/80 py-3 px-4 text-center shadow-sm mb-6">
            <span class="text-xs font-extrabold text-[#5C164E] flex items-center justify-center gap-2">
                <span>🛡️ 100% Curated Quality</span>
                <span class="text-pink-500">•</span>
                <span>🍃 Slow Fashion Eco-Friendly</span>
            </span>
        </div>

    </main>

    <!-- Script Show/Hide Password & Password Strength Checker -->
    <script>
        function togglePass(id) {
            const input = document.getElementById(id);
            if (input) {
                input.type = input.type === 'password' ? 'text' : 'password';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const regPasswordInput = document.getElementById('password');
            const bar1 = document.getElementById('reg-bar-1');
            const bar2 = document.getElementById('reg-bar-2');
            const bar3 = document.getElementById('reg-bar-3');
            const text = document.getElementById('reg-strength-text');

            if (regPasswordInput && bar1 && bar2 && bar3 && text) {
                regPasswordInput.addEventListener('input', function () {
                    const val = this.value;
                    let score = 0;

                    if (val.length > 0) {
                        if (val.length >= 8) score++; // Minimal 8 karakter
                        if (/[0-9]/.test(val)) score++; // Ada angka
                        if (/[^A-Za-z0-9]/.test(val) || val.length >= 12) score++; // Ada simbol atau sangat panjang
                        if (score === 0) score = 1; // Minimal 1 bar jika sudah mulai mengetik
                    }

                    // Reset warna bar ke abu-abu
                    bar1.style.backgroundColor = '#e5e7eb';
                    bar2.style.backgroundColor = '#e5e7eb';
                    bar3.style.backgroundColor = '#e5e7eb';

                    if (val.length === 0) {
                        text.textContent = 'Belum diisi';
                        text.style.color = '#847370';
                    } else if (score === 1) {
                        bar1.style.backgroundColor = '#ba1a1a';
                        text.textContent = 'Lemah';
                        text.style.color = '#ba1a1a';
                    } else if (score === 2) {
                        bar1.style.backgroundColor = 'rgb(255, 73, 193)';
                        bar2.style.backgroundColor = 'rgb(255, 73, 193)';
                        text.textContent = 'Sedang / Baik';
                        text.style.color = 'rgb(106, 20, 82)';
                    } else if (score >= 3) {
                        bar1.style.backgroundColor = '#2e7d32';
                        bar2.style.backgroundColor = '#2e7d32';
                        bar3.style.backgroundColor = '#2e7d32';
                        text.textContent = 'Sangat Kuat ✨';
                        text.style.color = '#2e7d32';
                    }
                });
            }
        });
    </script>
</body>
</html>
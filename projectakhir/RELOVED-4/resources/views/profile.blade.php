<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Reloved</title>
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
<body class="text-[#5C164E] min-h-screen flex flex-col justify-between pb-16">

    <!-- Top Navigation Bar -->
    <header class="bg-[#FFF9FB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('product.index') }}" class="w-8 h-8 rounded-full hover:bg-pink-100 flex items-center justify-center text-[#5C164E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="font-serif-title text-lg font-extrabold text-[#5C164E]">Pengaturan Akun ✨</h1>
            </div>

            <!-- Tombol Keluar Cepat di Header -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-bold text-rose-600 hover:bg-rose-50 px-3 py-1.5 rounded-full transition">
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-xl w-full mx-auto px-4 sm:px-6 pt-6">

        <!-- Notifikasi Sukses (Jika ada) -->
        @if(session('success'))
            <div class="mb-5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card Profil Utama -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 mb-6 text-center">
            <div class="w-20 h-20 mx-auto rounded-full overflow-hidden ring-4 ring-pink-200 shadow-md mb-3">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}" alt="Avatar" class="w-full h-full object-cover">
            </div>
            <h2 class="font-serif-title text-xl font-extrabold text-[#5C164E]">{{ Auth::user()->name }}</h2>
            <p class="text-xs text-[#7A356B] mt-0.5">{{ Auth::user()->email }}</p>
            <span class="inline-block mt-3 bg-pink-100 text-pink-700 text-[10px] font-extrabold px-3 py-1 rounded-full">
                🌸 Anggota Reloved Club
            </span>
        </div>

        <!-- Form Edit Profil -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8">
            <h3 class="text-sm font-extrabold text-[#5C164E] mb-4">Informasi Profil</h3>

            <form action="#" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Email Aktif</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" required
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Nomor WhatsApp</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone ?? '-' }}"
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <button type="submit" class="w-full py-3.5 rounded-full bg-gradient-to-r from-[#FF2E93] to-[#FF47A1] hover:opacity-95 text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-pink-200 transition cursor-pointer mt-2">
                    Simpan Perubahan ✨
                </button>
            </form>
        </div>

    </main>

</body>
</html>
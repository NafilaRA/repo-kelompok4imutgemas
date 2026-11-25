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
                <h1 class="font-serif-title text-lg font-extrabold text-[#5C164E]">Pengaturan Akun </h1>
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

        @php
            $rawHandle = Auth::user()->username ?? Auth::user()->name ?? 'US';
            $cleanHandle = preg_replace('/[^A-Za-z0-9]/', '', $rawHandle);
            $initials = strtoupper(substr($cleanHandle ?: 'US', 0, 2));
            $initials = str_pad($initials, 2, 'X');
        @endphp

        <!-- Notifikasi Sukses (Jika ada) -->
        @if(session('success'))
            <div class="mb-5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card Profil Utama -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 mb-6 text-center">
            <label for="avatar-input" class="group relative w-20 h-20 mx-auto block cursor-pointer mb-3" title="Ganti foto profil">
                <div class="w-full h-full rounded-full overflow-hidden ring-4 ring-pink-200 group-hover:ring-[#FF2E93] shadow-md transition flex items-center justify-center bg-gradient-to-br from-[#FF2E93] to-[#FF7EB6]">
                    <!-- Default Avatar 2 Huruf dari Username -->
                    <span id="avatar-initials"
                        class="text-white font-extrabold text-xl tracking-wider select-none {{ Auth::user()->avatar ? 'hidden' : '' }}">
                        {{ $initials }}
                    </span>

                    <!-- Preview Foto Profil (Uploaded / Baru Dipilih) -->
                    <img id="avatar-preview"
                        src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : '' }}"
                        alt="Avatar"
                        class="w-full h-full object-cover group-hover:brightness-90 transition {{ Auth::user()->avatar ? '' : 'hidden' }}">
                </div>

                <!-- Badge Ikon Kamera di Pojok Bunder Profil -->
                <span class="absolute bottom-0 right-0 w-7 h-7 rounded-full bg-[#FF2E93] text-white ring-2 ring-white shadow flex items-center justify-center group-hover:scale-105 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
            </label>

            <h2 class="font-serif-title text-xl font-extrabold text-[#5C164E]">{{ Auth::user()->name }}</h2>
            <p class="text-xs text-[#7A356B] mt-0.5">{{ Auth::user()->email }}</p>
            <span class="inline-block mt-2.5 bg-pink-100 text-pink-700 text-[10px] font-extrabold px-3 py-1 rounded-full">
                🌸 Anggota Reloved Club
            </span>
        </div>

        <!-- Form Edit Profil -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8">
            <h3 class="text-sm font-extrabold text-[#5C164E] mb-4">Informasi Profil</h3>

            @if ($errors->any())
                <div class="mb-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Input file wajib di dalam <form> agar ikut terkirim -->
                <input type="file" id="avatar-input" name="avatar" accept="image/*" class="hidden">

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Email Aktif</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Nomor WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="08xxxxxxxxxx"
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-[#5C164E] mb-1.5">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" placeholder="Alamat lengkap"
                        class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm text-[#5C164E] focus:outline-none focus:ring-2 focus:ring-[#FF2E93] focus:bg-white transition">
                </div>

                <button type="submit" class="w-full py-3.5 rounded-full bg-gradient-to-r from-[#FF2E93] to-[#FF47A1] hover:opacity-95 text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-pink-200 transition cursor-pointer mt-2">
                    Simpan Perubahan 
                </button>
            </form>
        </div>

        <script>
            document.getElementById('avatar-input')?.addEventListener('change', function (e) {
                const file = e.target.files?.[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = function (event) {
                    const preview = document.getElementById('avatar-preview');
                    const initials = document.getElementById('avatar-initials');
                    if (preview && event.target?.result) {
                        preview.src = event.target.result;
                        preview.classList.remove('hidden');
                    }
                    if (initials) {
                        initials.classList.add('hidden');
                    }
                };
                reader.readAsDataURL(file);
            });
        </script>

    </main>

</body>
</html>
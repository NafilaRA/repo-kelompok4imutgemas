<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloved - Worn & Loved</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FFFDFB;
        }
        /* Menyembunyikan scrollbar pada bar kategori horizontal */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="text-stone-800 pb-24">

    <!-- Top Header -->
    <header class="bg-[#FFFDFB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <!-- Brand & Tagline -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-pink-100 to-rose-200 border border-pink-200 flex items-center justify-center shadow-sm overflow-hidden">
                <img src="{{ asset('images/icon/logo-reloved.jpeg') }}" 
                    alt="Logo Reloved" 
                    class="w-full h-full object-contain scale-125 mix-blend-multiply">
                </div>
            <div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('product.index') }}" class="text-lg font-extrabold text-stone-800 tracking-tight">
                            Reloved
                        </a>
                        <span class="bg-rose-100 text-rose-600 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                            Worn & Loved
                        </span>
                    </div>
                    <p class="text-[11px] font-medium text-stone-400">Belanja</p>
                </div>
            </div>

            <!-- Right Icons (Wishlist & Avatar) -->
            <div class="flex items-center gap-3">
                <button type="button" class="w-9 h-9 rounded-full bg-white border border-pink-100 flex items-center justify-center text-stone-600 hover:text-pink-500 hover:border-pink-300 transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                <div class="w-9 h-9 rounded-full bg-pink-200 border-2 border-white shadow-sm overflow-hidden">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Nafila&backgroundColor=ffd5dc" alt="User" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-4 space-y-5">

        <!-- Search Bar (Butter Yellow) -->
        <!-- Search Bar & Filter Button (Terpisah) -->
        <div class="flex items-center gap-2">
            <!-- Form Pencarian Teks -->
            <form action="{{ route('product.index') }}" method="GET" class="relative flex-1">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('size'))
                    <input type="hidden" name="size" value="{{ request('size') }}">
                @endif
                @if(request('color'))
                    <input type="hidden" name="color" value="{{ request('color') }}">
                @endif
                @if(request('condition'))
                    <input type="hidden" name="condition" value="{{ request('condition') }}">
                @endif

                <div class="relative w-full flex items-center bg-[#FEF5B8] border border-amber-200/80 rounded-full px-4 py-2.5 shadow-sm focus-within:ring-2 focus-within:ring-pink-300 transition">
                    <svg class="w-4 h-4 text-stone-500 mr-2.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari baju vintage preloved..."
                        class="w-full bg-transparent text-xs sm:text-sm text-stone-700 placeholder-stone-500 focus:outline-none">
                    
                    <button type="submit" class="ml-2 text-xs font-bold text-amber-800 hover:text-pink-600 shrink-0">
                        Cari
                    </button>
                </div>
            </form>

            <!-- Tombol Bundar Pink Filter (Di luar Form, dijamin bisa diklik!) -->
            <button type="button" onclick="openFilterModal()" title="Buka Filter"
                class="w-11 h-11 rounded-full bg-[#EC4899] hover:bg-pink-600 text-white flex items-center justify-center shrink-0 shadow-md transition transform hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </button>
        </div>

        <!-- Active Filter Tags (Dinamis & Bisa Disilang Satu per Satu) -->
        @if(request()->anyFilled(['size', 'color', 'condition', 'search']))
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                
                <!-- 1. Tag Ukuran (Size) -->
                @if(request()->filled('size'))
                    @php
                        $sizeLabels = [
                            'S' => 'Size S (LD <90)',
                            'M' => 'Size M (LD 90–100)',
                            'L' => 'Size L (LD 100–110)',
                            'XL' => 'Size XL (LD 110+)',
                        ];
                    @endphp
                    <a href="{{ route('product.index', request()->except('size')) }}"
                       title="Hapus filter ukuran"
                       class="inline-flex items-center gap-1.5 bg-[#FADADD] hover:bg-rose-200 text-rose-800 text-[11px] font-bold px-3 py-1 rounded-full shrink-0 transition">
                        <span>📏 {{ $sizeLabels[request('size')] ?? 'Size ' . request('size') }}</span>
                        <span class="ml-1 text-rose-950 font-extrabold">✕</span>
                    </a>
                @endif

                <!-- 2. Tag Nuansa Warna -->
                @if(request()->filled('color'))
                    @php
                        $colorLabels = [
                            'Pink' => 'Warna: Soft Pink',
                            'Sage' => 'Warna: Sage Green',
                            'Yellow' => 'Warna: Butter Yellow',
                            'Cream' => 'Warna: Cream / Linen',
                        ];
                    @endphp
                    <a href="{{ route('product.index', request()->except('color')) }}"
                       title="Hapus filter warna"
                       class="inline-flex items-center gap-1.5 bg-[#FEF3C7] hover:bg-amber-200 text-amber-900 text-[11px] font-bold px-3 py-1 rounded-full shrink-0 transition">
                        <span>🎨 {{ $colorLabels[request('color')] ?? 'Warna: ' . request('color') }}</span>
                        <span class="ml-1 text-amber-950 font-extrabold">✕</span>
                    </a>
                @endif

                <!-- 3. Tag Standar Kondisi -->
                @if(request()->filled('condition'))
                    @php
                        $condLabels = [
                            'like_new' => 'Kondisi: Like New',
                            'rare_find' => 'Kondisi: Rare Find',
                            'vintage' => 'Kondisi: Vintage Vibe',
                        ];
                    @endphp
                    <a href="{{ route('product.index', request()->except('condition')) }}"
                       title="Hapus filter kondisi"
                       class="inline-flex items-center gap-1.5 bg-[#FCE7F3] hover:bg-pink-200 text-pink-800 text-[11px] font-bold px-3 py-1 rounded-full shrink-0 transition">
                        <span>✨ {{ $condLabels[request('condition')] ?? request('condition') }}</span>
                        <span class="ml-1 text-pink-950 font-extrabold">✕</span>
                    </a>
                @endif

                <!-- 4. Tag Kata Kunci Pencarian (Search) -->
                @if(request()->filled('search'))
                    <a href="{{ route('product.index', request()->except('search')) }}"
                       title="Hapus pencarian"
                       class="inline-flex items-center gap-1.5 bg-stone-200 hover:bg-stone-300 text-stone-800 text-[11px] font-bold px-3 py-1 rounded-full shrink-0 transition">
                        <span>🔍 "{{ request('search') }}"</span>
                        <span class="ml-1 text-stone-950 font-extrabold">✕</span>
                    </a>
                @endif

                <!-- Tombol Reset Semua (Muncul jika filter aktif lebih dari 1) -->
                @if(count(array_filter(request()->only(['size', 'color', 'condition', 'search']))) > 1)
                    <a href="{{ route('product.index', request()->only('category')) }}"
                       class="inline-flex items-center gap-1 bg-stone-800 hover:bg-stone-700 text-white text-[11px] font-bold px-3 py-1 rounded-full shrink-0 transition">
                        Hapus Semua
                    </a>
                @endif
            </div>
        @endif

        <!-- Category Pills (Dynamic from Database) -->
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-1">
            <a href="{{ route('product.index', request()->except('category')) }}"
               class="px-4 py-1.5 rounded-full text-xs font-bold transition shrink-0 shadow-sm {{ !request('category') ? 'bg-[#EC4899] text-white' : 'bg-white border border-stone-200 text-stone-600 hover:border-pink-300' }}">
                Semua
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('product.index', array_merge(request()->except('category'), ['category' => $category->slug])) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition shrink-0 shadow-sm {{ request('category') == $category->slug ? 'bg-[#EC4899] text-white' : 'bg-white border border-stone-200 text-stone-600 hover:border-pink-300' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Promo Banner: Drop Koleksi Minggu Ini! -->
        <div class="relative rounded-3xl bg-gradient-to-r from-[#FFF5C0] via-[#FDE6D8] to-[#FBCFE8] p-5 sm:p-7 border border-pink-100 shadow-sm overflow-hidden">
            <!-- Top Right Floating Badges -->
            <div class="flex sm:flex-col items-end gap-1.5 sm:absolute sm:top-5 sm:right-6 mb-3 sm:mb-0">
                <span class="bg-[#831843] text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">
                    Rare Cut
                </span>
                <span class="bg-white/90 text-emerald-700 text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">
                    ✨ Cleaned
                </span>
            </div>

            <div class="max-w-lg">
                <span class="inline-block bg-white/80 text-amber-800 text-[10px] font-extrabold tracking-wider uppercase px-3 py-1 rounded-full mb-2.5 shadow-sm">
                    1 OF 1 THRIFT ✨
                </span>
                <h1 class="text-xl sm:text-2xl font-extrabold text-stone-900 mb-1">
                    Drop Koleksi Minggu Ini!
                </h1>
                <p class="text-xs sm:text-sm text-stone-600 mb-4">
                    Potongan vintage terkurasi &amp; wangi laundried, siap kirim.
                </p>
                <a href="#katalog-produk" class="inline-flex items-center gap-1.5 text-xs font-bold text-stone-800 border-b-2 border-pink-400 pb-0.5 hover:text-pink-600 transition">
                    Lihat Koleksi Baru <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Reloved Standard Info Bar -->
        <div class="bg-[#FFFBEB] border border-amber-200/70 rounded-2xl px-4 py-3 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-stone-800">Reloved Standard</h3>
                    <p class="text-[11px] text-stone-500">Kondisi dicek teliti: Bersih, harum &amp; no defect</p>
                </div>
            </div>
            <span class="text-stone-400 text-xs font-bold border border-stone-300 rounded-full w-5 h-5 flex items-center justify-center">i</span>
        </div>

        <!-- Section Header: Pilihan Gem -->
        <div id="katalog-produk" class="flex items-center justify-between pt-2">
            <div class="flex items-baseline gap-2">
                <h2 class="text-base sm:text-lg font-extrabold text-stone-900">Pilihan Gem</h2>
                <span class="text-xs font-semibold text-pink-500">({{ $products->count() }} item tersedia)</span>
            </div>
            <span class="text-xs font-bold text-pink-600 flex items-center gap-1">
                Urutkan ⇅
            </span>
        </div>

        <!-- Product Grid -->
        @if($products->isEmpty())
            <div class="bg-white rounded-3xl border border-pink-100 p-12 text-center shadow-sm">
                <p class="text-stone-500 text-sm mb-3">Yah, baju yang kamu cari belum ketemu atau sudah sold out~</p>
                <a href="{{ route('product.index') }}" class="inline-block bg-[#EC4899] text-white text-xs font-bold px-5 py-2.5 rounded-full hover:bg-pink-600 transition">
                    Lihat Semua Koleksi
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-3xl border border-stone-200/80 overflow-hidden shadow-sm hover:shadow-md transition group flex flex-col justify-between">
                        <div>
                            <!-- Product Image Wrapper -->
                            <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                                <a href="{{ route('product.show', $product->code) }}">
                                    <img src="{{ asset($product->image) }}"
                                         alt="{{ $product->name }}"
                                         onerror="this.src='https://placehold.co/400x500/fce7f3/db2777?text={{ $product->code }}'"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                </a>

                                <!-- Top Left Badges -->
                                <div class="absolute top-2.5 left-2.5 flex flex-col items-start gap-1">
                                    @if ($product->badge)
                                        <span class="bg-[#FEF08A] text-stone-800 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full shadow-sm">
                                            {{ $product->badge }} ✨
                                        </span>
                                    @endif
                                    <span class="bg-[#831843] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">
                                        {{ $product->category->name }}
                                    </span>
                                </div>

                                <!-- Top Right Wishlist Heart -->
                                <!-- Ganti tombol bundar pink di dalam search bar dengan ini -->
                                <button type="button" onclick="openFilterModal()" title="Filter Pakaian"
                                    class="ml-2 w-8 h-8 rounded-full bg-[#EC4899] hover:bg-pink-600 text-white flex items-center justify-center shrink-0 shadow-sm transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </button>

                                <!-- Bottom Left Condition Pill -->
                                <span class="absolute bottom-2.5 left-2.5 bg-white/95 text-stone-700 text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">
                                    Kondisi: {{ $product->condition }}
                                </span>
                            </div>

                            <!-- Card Details -->
                            <div class="p-3.5 pb-2">
                                <!-- Size Tag -->
                                <span class="inline-block bg-[#FADADD] text-rose-800 text-[10px] font-bold px-2.5 py-0.5 rounded-full mb-1.5">
                                    Size {{ $product->size->name }}
                                </span>

                                <!-- Product Name -->
                                <h3 class="font-bold text-stone-800 text-xs sm:text-sm line-clamp-1">
                                    <a href="{{ route('product.show', $product->code) }}" class="hover:text-pink-600 transition">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>

                        <!-- Bottom Price & Pink Cart Button -->
                        <div class="px-3.5 pb-3.5 pt-1 flex items-end justify-between">
                            <div>
                                <div class="text-sm sm:text-base font-extrabold text-stone-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                @if ($product->original_price)
                                    <div class="text-[11px] text-stone-400 line-through">
                                        Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('product.show', $product->code) }}"
                               title="Lihat Detail & Beli"
                               class="w-9 h-9 rounded-full bg-[#EC4899] hover:bg-pink-600 text-white flex items-center justify-center shadow-sm transition shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Bottom Navigation Bar -->
    <nav class="fixed bottom-0 inset-x-0 bg-white/95 backdrop-blur-md border-t border-pink-100 z-50">
        <div class="max-w-xl mx-auto px-4 h-16 flex items-center justify-around">
            <a href="{{ route('product.index') }}" class="flex flex-col items-center gap-1 text-[#EC4899]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <span class="text-[10px] font-bold">Belanja</span>
            </a>

            <a href="#katalog-produk" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="text-[10px] font-semibold">Katalog</span>
            </a>

            <a href="#" class="relative flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <span class="absolute -top-1.5 right-0 bg-[#EC4899] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                    0
                </span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-[10px] font-semibold">Keranjang</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span class="text-[10px] font-semibold">Pesanan</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] font-semibold">Akun</span>
            </a>
        </div>
    </nav>

    <!-- MODAL FILTER PAKAIAN PRELOVED (Bottom Sheet) -->
    <div id="filterModal" class="fixed inset-0 z-50 hidden">
        <!-- Overlay Blur Latar Belakang -->
        <div onclick="closeFilterModal()" class="fixed inset-0 bg-rose-950/30 backdrop-blur-sm transition-opacity"></div>

        <!-- Konten Panel Filter -->
        <div class="fixed bottom-0 inset-x-0 bg-[#FFFDFB] rounded-t-3xl border-t border-pink-100 shadow-2xl max-w-4xl mx-auto p-6 sm:p-8 z-10 max-h-[88vh] overflow-y-auto">
            <form action="{{ route('product.index') }}" method="GET">
                <!-- Simpan filter kategori & search yang sedang aktif -->
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2.5">
                        <span class="text-pink-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </span>
                        <h3 class="text-base sm:text-lg font-extrabold text-stone-900">Filter Pakaian Preloved</h3>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold text-pink-500 hidden sm:inline">LD 85 – 110 cm</span>
                        <button type="button" onclick="closeFilterModal()" class="w-8 h-8 rounded-full bg-[#FEF08A] hover:bg-amber-200 text-stone-800 flex items-center justify-center font-bold text-sm transition">
                            ✕
                        </button>
                    </div>
                </div>

                <!-- 1. Ukuran & LD (Lingkar Dada) -->
                <div class="mb-6">
                    <label class="block text-xs font-extrabold text-stone-800 mb-3">Ukuran &amp; LD (Lingkar Dada)</label>
                    <div class="flex flex-wrap gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="size" value="" class="peer sr-only" {{ !request('size') ? 'checked' : '' }}>
                            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold border border-stone-200 bg-white text-stone-700 peer-checked:bg-[#831843] peer-checked:text-white peer-checked:border-[#831843] transition">
                                Semua Ukuran
                            </span>
                        </label>

                        @php
                            $sizeOptions = [
                                'S' => 'Size S (LD <90)',
                                'M' => 'Size M (LD 90–100)',
                                'L' => 'Size L (LD 100–110)',
                                'XL' => 'Size XL (LD 110+)',
                            ];
                        @endphp

                        @foreach($sizeOptions as $val => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="size" value="{{ $val }}" class="peer sr-only" {{ request('size') == $val ? 'checked' : '' }}>
                                <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold border border-pink-100 bg-[#FADADD]/60 text-stone-800 peer-checked:bg-[#831843] peer-checked:text-white transition">
                                    {{ $label }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- 2. Nuansa Warna Favorit -->
                <div class="mb-6">
                    <label class="block text-xs font-extrabold text-stone-800 mb-3">Nuansa Warna Favorit</label>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $colors = [
                                ['val' => 'Pink', 'label' => 'Soft Pink', 'dot' => 'bg-pink-400', 'bg' => 'bg-pink-50 border-pink-200'],
                                ['val' => 'Sage', 'label' => 'Sage Green', 'dot' => 'bg-emerald-500', 'bg' => 'bg-emerald-50 border-emerald-200'],
                                ['val' => 'Yellow', 'label' => 'Butter Yellow', 'dot' => 'bg-amber-400', 'bg' => 'bg-amber-50 border-amber-200'],
                                ['val' => 'Cream', 'label' => 'Cream / Linen', 'dot' => 'bg-stone-400', 'bg' => 'bg-stone-100 border-stone-200'],
                            ];
                        @endphp

                        @foreach($colors as $c)
                            <label class="cursor-pointer">
                                <input type="radio" name="color" value="{{ $c['val'] }}" class="peer sr-only" {{ request('color') == $c['val'] ? 'checked' : '' }}>
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $c['bg'] }} text-stone-700 peer-checked:ring-2 peer-checked:ring-[#EC4899] transition">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $c['dot'] }}"></span>
                                    {{ $c['label'] }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Standar Kondisi Vintage -->
                <div class="mb-6">
                    <label class="block text-xs font-extrabold text-stone-800 mb-3">Standar Kondisi Vintage</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="condition" value="like_new" class="peer sr-only" {{ request('condition') == 'like_new' ? 'checked' : '' }}>
                            <div class="p-3.5 rounded-2xl border border-stone-200 bg-white text-center peer-checked:bg-[#FADADD] peer-checked:border-pink-400 transition">
                                <div class="text-xs font-extrabold text-stone-900">Like New</div>
                                <div class="text-[11px] text-stone-500 mt-0.5">Tanpa jejak pakai</div>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="condition" value="rare_find" class="peer sr-only" {{ request('condition') == 'rare_find' ? 'checked' : '' }}>
                            <div class="p-3.5 rounded-2xl border border-stone-200 bg-white text-center peer-checked:bg-[#FADADD] peer-checked:border-pink-400 transition">
                                <div class="text-xs font-extrabold text-stone-900">Rare Find</div>
                                <div class="text-[11px] text-stone-500 mt-0.5">Sulit Ditemui</div>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="condition" value="vintage" class="peer sr-only" {{ request('condition') == 'vintage' ? 'checked' : '' }}>
                            <div class="p-3.5 rounded-2xl border border-stone-200 bg-white text-center peer-checked:bg-[#FADADD] peer-checked:border-pink-400 transition">
                                <div class="text-xs font-extrabold text-stone-900">Vintage Vibe</div>
                                <div class="text-[11px] text-stone-500 mt-0.5">Natural patina</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Tombol Aksi Modal -->
                <div class="flex items-center gap-3 pt-2">
                    <a href="{{ route('product.index') }}" class="w-1/3 text-center py-3 rounded-full border border-stone-300 text-xs font-bold text-stone-600 hover:bg-stone-100 transition">
                        Reset
                    </a>
                    <button type="submit" class="w-2/3 py-3 rounded-full bg-[#EC4899] hover:bg-pink-600 text-white text-xs font-extrabold shadow-md transition">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Buka / Tutup Modal Filter -->
    <script>
        function openFilterModal() {
            document.getElementById('filterModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Kunci scroll layar belakang
        }

        function closeFilterModal() {
            document.getElementById('filterModal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Aktifkan lagi scroll layar
        }
    </script>
</body>
</html>
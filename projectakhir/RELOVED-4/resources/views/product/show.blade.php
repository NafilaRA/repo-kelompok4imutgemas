<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name ?? 'Vintage Graphic Tee White' }} - Reloved</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FFF9FB; }
        .font-serif-title { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="text-stone-800 min-h-screen">

    <!-- Top Header -->
    <header class="bg-white border-b border-pink-100 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="{{ route('product.index') }}" class="text-lg font-extrabold tracking-tight text-stone-900">
                Reloved
            </a>

            <!-- Kembali ke Katalog dengan Ikon Rumah -->
            <a href="{{ route('product.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#EC4899] hover:text-pink-600 bg-pink-50 hover:bg-pink-100 border border-pink-200 px-3.5 py-2 rounded-full transition">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Kembali ke Katalog</span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <!-- Gambar Produk -->
            <div class="rounded-2xl bg-pink-50/60 border border-pink-100 p-4 flex items-center justify-center aspect-square overflow-hidden">
                <img src="{{ asset($product->image ?? '') }}" alt="{{ $product->name ?? 'Produk' }}" onerror="this.src='https://placehold.co/500x500/fce7f3/db2777?text=Reloved'" class="w-full h-full object-contain rounded-xl">
            </div>

            <!-- Detail Produk -->
            <div class="space-y-5">
                <div class="flex items-center gap-2 text-xs">
                    <span class="bg-pink-100 text-[#DB2777] font-bold px-3 py-1 rounded-full">
                        {{ $product->category->name ?? 'Kaos' }}
                    </span>
                    <span class="text-stone-400 font-medium">
                        Kode: {{ $product->code ?? $product->sku ?? 'RLV-002' }}
                    </span>
                </div>

                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900">
                        {{ $product->name ?? 'Vintage Graphic Tee White' }}
                    </h1>
                    <div class="flex items-baseline gap-3 mt-2">
                        <span class="text-2xl font-extrabold text-[#EC4899]">
                            Rp {{ number_format($product->price ?? 45000, 0, ',', '.') }}
                        </span>
                        @if(!empty($product->original_price))
                            <span class="text-sm text-stone-400 line-through">
                                Rp {{ number_format($product->original_price, 0, ',', '.') }}
                            </span>
                        @else
                            <span class="text-sm text-stone-400 line-through">Rp 55.000</span>
                        @endif
                    </div>
                </div>

                <div class="border-t border-b border-pink-100 py-4 space-y-2.5 text-xs sm:text-sm">
                    <div class="flex justify-between">
                        <span class="text-stone-500">Ukuran (Size)</span>
                        <span class="font-bold text-stone-900">{{ $product->size->name ?? 'M (-)' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-stone-500">Kondisi Fisik</span>
                        <span class="font-bold text-[#EC4899]">{{ $product->condition ?? '9.5/10' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-stone-500">Stok Tersedia</span>
                        <span class="font-bold text-stone-900">{{ $product->stock ?? 9 }} pcs</span>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-stone-500">Deskripsi Produk</h2>
                    <p class="text-sm text-stone-600 leading-relaxed">
                        {{ $product->description ?? 'Kaos vintage warna putih bersih, bahan cotton combed adem.' }}
                    </p>
                </div>

                <!-- Tombol Tambah ke Keranjang (Pink) -->
                <form action="{{ route('cart.store', $product->id ?? 1) }}" method="POST" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-[#EC4899] hover:from-pink-600 hover:to-pink-700 text-white font-bold text-sm py-3.5 px-6 rounded-2xl shadow-md shadow-pink-200 transition flex items-center justify-center gap-2">
                        <span>+ Tambah ke Keranjang</span>
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Reloved</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('product.index') }}" class="text-2xl font-bold tracking-tight text-emerald-800">
                RELOVED<span class="text-amber-600">.</span>
            </a>
            <a href="{{ route('product.index') }}" class="text-sm font-medium text-stone-600 hover:text-emerald-800">
                &larr; Kembali ke Katalog
            </a>
        </div>
    </nav>

    <!-- Detail Produk -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden grid grid-cols-1 md:grid-cols-2">
            
            <!-- Foto Produk -->
            <div class="bg-stone-200 aspect-[4/5] md:aspect-auto">
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}"
                     onerror="this.src='https://placehold.co/600x750/e7e5e4/57534e?text={{ $product->code }}'"
                     class="w-full h-full object-cover">
            </div>

            <!-- Informasi Lengkap -->
            <div class="p-6 md:p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $product->category->name }}
                        </span>
                        <span class="text-xs text-stone-400">Kode: {{ $product->code }}</span>
                    </div>

                    <h1 class="text-2xl md:text-3xl font-bold text-stone-900 mb-3">{{ $product->name }}</h1>

                    <!-- Harga -->
                    <div class="flex items-baseline gap-3 mb-6">
                        <span class="text-2xl font-bold text-emerald-800">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        @if ($product->original_price)
                            <span class="text-sm text-stone-400 line-through">
                                Rp {{ number_format($product->original_price, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>

                    <!-- Spesifikasi Thrift -->
                    <div class="border-y border-stone-200 py-4 space-y-2.5 text-sm mb-6">
                        <div class="flex justify-between">
                            <span class="text-stone-500">Ukuran (Size)</span>
                            <span class="font-semibold">{{ $product->size->name }} ({{ $product->size->chest_width_range ?? '-' }})</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-stone-500">Kondisi Fisik</span>
                            <span class="font-semibold text-emerald-700">{{ $product->condition }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-stone-500">Stok Tersedia</span>
                            <span class="font-semibold">{{ $product->stock }} pcs</span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-stone-700 mb-1">Deskripsi Produk</h3>
                        <p class="text-sm text-stone-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Tombol Beli / Keranjang -->
                <div class="space-y-3">
                    <button type="button" 
                            class="w-full bg-emerald-800 hover:bg-emerald-900 text-white font-semibold py-3 px-6 rounded-xl transition shadow-sm">
                        + Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
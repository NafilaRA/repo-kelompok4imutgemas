<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Reloved</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FFFDFB;
        }
    </style>
</head>
<body class="text-stone-800 min-h-screen pb-16">

    <header class="bg-[#FFFDFB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('product.index') }}" class="w-8 h-8 rounded-full hover:bg-pink-100 flex items-center justify-center text-stone-700 transition">
                    &larr;
                </a>
                <h1 class="text-base sm:text-lg font-extrabold text-stone-900">Tambah Produk Preloved</h1>
            </div>
        </div>
    </header>

    <main class="max-w-2xl mx-auto px-4 sm:px-6 pt-6">
        @if ($errors->any())
            <div class="mb-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold px-4 py-3 rounded-2xl">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Vintage Knit Cream"
                    class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:bg-white transition">
            </div>

            <div>
                <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" required min="0" placeholder="Contoh: 85000"
                    class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:bg-white transition">
            </div>

            <div>
                <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Kategori</label>
                <select name="category_id"
                    class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:bg-white transition">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Kondisi</label>
                <select name="condition"
                    class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:bg-white transition">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="Like New" {{ old('condition') == 'Like New' ? 'selected' : '' }}>Like New</option>
                    <option value="Rare Find" {{ old('condition') == 'Rare Find' ? 'selected' : '' }}>Rare Find</option>
                    <option value="Vintage Vibe" {{ old('condition') == 'Vintage Vibe' ? 'selected' : '' }}>Vintage Vibe</option>
                </select>
            </div>

                    <div>
            <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Ukuran (Size)</label>
            <select name="size_id" required
                class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-full px-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:bg-white transition">
                <option value="">-- Pilih Ukuran --</option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>
                        {{ $size->name }}
                    </option>
                @endforeach
            </select>
        </div>

            <div>
                <label class="block text-xs font-extrabold text-stone-800 mb-1.5">Foto Produk</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-[#FDF2F6] border border-pink-200/80 rounded-2xl px-4 py-2.5 text-xs text-stone-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#EC4899] file:text-white hover:file:bg-pink-600">
            </div>

            <button type="submit" class="w-full py-3.5 rounded-full bg-[#EC4899] hover:bg-pink-600 text-white text-xs sm:text-sm font-extrabold shadow-md transition cursor-pointer mt-2">
                Simpan Produk ✨
            </button>
        </form>
    </main>

</body>
</html>
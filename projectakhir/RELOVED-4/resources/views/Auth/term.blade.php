<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan serta Kebijakan Privasi - Reloved</title>
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
<body class="text-[#5C164E] min-h-screen flex flex-col justify-between pb-12">

    <!-- Top Navigation Bar -->
    <header class="bg-[#FFF9FB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('signup') }}" class="w-8 h-8 rounded-full hover:bg-pink-100 flex items-center justify-center text-[#5C164E] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="font-serif-title text-lg font-extrabold text-[#5C164E]">Ketentuan & Privasi</h1>
            </div>

            <a href="{{ route('product.index') }}" class="text-xs font-bold text-[#FF2E93] hover:underline">
                Ke Beranda &rarr;
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl w-full mx-auto px-4 sm:px-6 pt-8 space-y-8">
        
        <!-- Header Banner -->
        <div class="bg-[#FEF9C3] border border-amber-200/80 rounded-3xl p-6 sm:p-8 text-center shadow-sm">
            <span class="inline-block bg-[#F472B6] text-white text-[11px] font-bold px-4 py-1.5 rounded-full shadow-sm mb-3">
                🌸 PUSAT INFORMASI HUKUM RELOVED
            </span>
            <h2 class="font-serif-title text-2xl sm:text-3xl font-extrabold text-[#5C164E] mb-2">
                Syarat & Ketentuan serta Kebijakan Privasi
            </h2>
            <p class="text-xs sm:text-sm text-[#7A356B]">
                Komitmen kami dalam menjaga kenyamanan, keamanan, dan kepercayaan para *thrift lovers* di <strong class="font-extrabold">Reloved</strong>.
            </p>
        </div>

        <!-- Bagian 1: Syarat & Ketentuan -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 space-y-4">
            <div class="flex items-center gap-3 border-b border-pink-100 pb-4">
                <div class="w-10 h-10 rounded-2xl bg-pink-100 text-[#FF2E93] flex items-center justify-center font-bold text-lg">
                    📋
                </div>
                <h3 class="font-serif-title text-xl font-extrabold text-[#5C164E]">Syarat & Ketentuan Penggunaan</h3>
            </div>

            <div class="text-xs sm:text-sm text-stone-700 space-y-3 leading-relaxed">
                <p>
                    Selamat datang di <strong>Reloved</strong>. Dengan mengakses dan menggunakan platform preloved kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan di bawah ini:
                </p>
                <ul class="list-disc pl-5 space-y-2 text-[#7A356B]">
                    <li><strong>Keaslian & Kondisi Barang:</strong> Seluruh pakaian di Reloved merupakan koleksi pilihan <em>1-of-1 thrift gems</em> yang telah melalui proses kurasi ketat dan sterilisasi higienis (laundried). Detail ukuran dan kondisi telah dicantumkan secara transparan pada deskripsi produk.</li>
                    <li><strong>Pemesanan & Pembayaran:</strong> Transaksi dianggap sah setelah pembeli menyelesaikan proses *checkout* dan pembayaran sesuai metode yang tersedia. Mengingat sifat barang preloved bersifat terbatas, pesanan akan diproses berdasarkan urutan konfirmasi tercepat.</li>
                    <li><strong>Pembatalan & Pengembalian:</strong> Kebijakan pengembalian dana atau retur berlaku jika terbukti ada cacat mayor (major defect) yang tidak tertulis pada deskripsi produk saat diterima.</li>
                </ul>
            </div>
        </div>

        <!-- Bagian 2: Kebijakan Privasi -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 space-y-4">
            <div class="flex items-center gap-3 border-b border-pink-100 pb-4">
                <div class="w-10 h-10 rounded-2xl bg-pink-100 text-[#FF2E93] flex items-center justify-center font-bold text-lg">
                    🔒
                </div>
                <h3 class="font-serif-title text-xl font-extrabold text-[#5C164E]">Kebijakan Privasi (Privacy Policy)</h3>
            </div>

            <div class="text-xs sm:text-sm text-stone-700 space-y-3 leading-relaxed">
                <p>
                    Kami sangat menghargai privasi dan keamanan data pribadi Anda. Kebijakan Privasi ini menjelaskan bagaimana Reloved mengumpulkan dan melindungi informasi Anda:
                </p>
                <ul class="list-disc pl-5 space-y-2 text-[#7A356B]">
                    <li><strong>Pengumpulan Data:</strong> Kami mengumpulkan informasi dasar seperti Nama Lengkap, Email, dan Nomor WhatsApp yang Anda berikan secara sukarela saat melakukan pendaftaran akun atau transaksi.</li>
                    <li><strong>Keamanan Data (256-Bit Encryption):</strong> Seluruh data sensitif termasuk kata sandi dan transaksi dilindungi menggunakan teknologi enkripsi tingkat tinggi untuk mencegah kebocoran data.</li>
                    <li><strong>Penggunaan Informasi:</strong> Data Anda hanya digunakan untuk keperluan pengiriman notifikasi kilat drop koleksi, pelacakan pesanan, serta peningkatan kualitas layanan platform Reloved. Kami tidak pernah membagikan data Anda kepada pihak ketiga yang tidak berkepentingan.</li>
                </ul>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center pt-2">
            <a href="{{ route('signup') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full bg-gradient-to-r from-[#FF2E93] to-[#FF47A1] text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-pink-200 hover:opacity-95 transition">
                <span>&larr; Kembali ke Halaman Pendaftaran</span>
            </a>
        </div>

    </main>

    <!-- Footer Simple -->
    <footer class="text-center text-xs text-[#9D5C8F] mt-16">
        &copy; 2026 Reloved Worn & Loved. Hak Cipta Dilindungi.
    </footer>

</body>
</html>
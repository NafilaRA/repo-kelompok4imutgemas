<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloved - Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FFFDFB; }
        .font-serif-title { font-family: 'Playfair Display', serif; }
        input[type="checkbox"] { accent-color: #3D5236; }
    </style>
</head>
<body class="text-stone-800 pb-28">

    <!-- Top Header -->
    <header class="bg-[#FFFDFB]/90 backdrop-blur-md sticky top-0 z-40 border-b border-pink-100/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-pink-100 to-rose-200 border border-pink-200 flex items-center justify-center shadow-sm overflow-hidden">
                <img src="{{ asset('images/icon/logo-reloved.jpeg') }}" 
                    alt="Logo Reloved" 
                    class="w-full h-full object-contain scale-125 mix-blend-multiply">
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('product.index') }}" class="text-lg font-extrabold text-stone-800 tracking-tight">Reloved</a>
                    </div>
                    <p class="text-[11px] font-medium text-stone-400">Keranjang Belanja</p>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                @auth
                    <span class="text-xs font-extrabold text-stone-800 hidden sm:inline">{{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 rounded-full overflow-hidden ring-2 ring-pink-300 shadow-sm">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}" alt="Profile" class="w-full h-full object-cover">
                    </div>
                @endauth
            </div>
        </div>
    </header>

    @php
        $itemCount = $cartItems->count();
    @endphp

    <!-- Main Container -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-4 space-y-5">

        <!-- Layout Utama (Grid 2 Kolom: Kiri Produk & Voucher, Kanan Ringkasan) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- KOLOM KIRI -->
            <div class="lg:col-span-2 space-y-4">
                
                <!-- Bar Pilih Semua -->
                <div class="flex items-center justify-between px-1 text-xs">
                    <label class="flex items-center gap-2 font-semibold text-stone-800 cursor-pointer">
                        <input type="checkbox" id="select-all" {{ $itemCount > 0 ? 'checked' : '' }} class="w-4 h-4 rounded">
                        <span>Pilih Semua (<span id="total-count-label">{{ $itemCount }}</span> item)</span>
                    </label>
                    @if($itemCount > 0)
                    <button type="button" onclick="deleteSelected()" class="text-stone-500 hover:text-red-600 flex items-center gap-1 font-medium cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Terpilih
                    </button>

                    <!-- Form tersembunyi untuk mengirim ID item yang dicentang -->
                    <form id="delete-selected-form" action="{{ route('cart.destroySelected') }}" method="POST" class="hidden">
                        @csrf
                        <div id="selected-ids-container"></div>
                    </form>
                    @endif
                </div>

                <!-- Daftar Card Produk Keranjang -->
                <div class="space-y-3" id="cart-list">
                    @forelse ($cartItems as $item)
                    <div class="bg-white border border-pink-100 rounded-3xl p-4 shadow-sm flex gap-4 items-start cart-item" 
                         data-id="{{ $item->id }}" 
                         data-price="{{ $item->product->price }}">
                        
                        <input type="checkbox" checked class="item-checkbox w-4 h-4 rounded mt-2 cursor-pointer">
                        
                        <!-- Foto Produk -->
                        <div class="relative w-24 h-28 rounded-2xl overflow-hidden bg-stone-100 shrink-0">
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" onerror="this.src='https://placehold.co/400x500/fce7f3/db2777?text=Item'" class="w-full h-full object-cover">
                            <span class="absolute bottom-1 left-1 bg-[#FEF08A] text-stone-900 text-[9px] font-extrabold px-1.5 py-0.5 rounded">1 OF 1</span>
                        </div>

                        <!-- Detail Produk -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="font-bold text-stone-900 text-sm sm:text-base truncate">{{ $item->product->name }}</h3>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-stone-400 hover:text-red-500 p-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>

                            <p class="text-xs text-stone-500 mt-1">
                                Size {{ $item->product->size->name ?? '-' }} • {{ $item->product->color ?? 'Vintage' }}
                            </p>

                            <!-- Badge Kondisi -->
                            <div class="flex items-center gap-1.5 mt-2">
                                <span class="bg-[#E5EDD8] text-[#3D5236] text-[11px] font-semibold px-2.5 py-0.5 rounded-full">
                                    ✓ Kondisi {{ $item->product->condition ?? '9.5/10' }}
                                </span>
                                <span class="text-[11px] text-stone-400">Bersih & Wangi</span>
                            </div>

                            <!-- Harga & Qty -->
                            <div class="flex items-end justify-between mt-3">
                                <div class="flex items-baseline gap-2">
                                    <span class="font-extrabold text-base text-stone-900">Rp {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                    @if($item->product->original_price)
                                    <span class="text-xs text-stone-400 line-through">Rp {{ number_format($item->product->original_price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                                <span class="bg-pink-50 border border-pink-200 text-stone-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    Qty: 1 (Terkunci)
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-16 bg-white rounded-3xl border border-pink-100 shadow-sm">
                        <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        </div>
                        <p class="text-sm font-bold text-stone-800 mb-1">Keranjangmu masih kosong nih</p>
                        <p class="text-xs text-stone-400 mb-4">Yuk cari baju thrift impianmu di katalog!</p>
                        <a href="{{ route('product.index') }}" class="inline-block bg-[#EC4899] hover:bg-pink-600 text-white text-xs font-bold px-6 py-2.5 rounded-full transition shadow-sm">
                            Mulai Belanja
                        </a>
                    </div>
                    @endforelse
                </div>

                @if($itemCount > 0)
                <!-- Box Voucher Belanja (Hanya muncul jika ada barang) -->
                <div class="bg-white rounded-3xl p-5 border border-pink-100 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 font-bold text-sm text-stone-900">
                        <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <span>Voucher Belanja & Promo</span>
                    </div>
                    
                    <div class="flex gap-2">
                        <input type="text" id="voucher-input" placeholder="Masukkan kode (misal: RELOVEDVIBES)" 
                               class="flex-1 bg-stone-50 border border-stone-200 rounded-full px-4 py-2.5 text-xs font-bold uppercase focus:outline-none focus:ring-2 focus:ring-pink-300">
                        <button type="button" onclick="applyManualVoucher()" class="bg-[#831843] hover:bg-pink-900 text-white text-xs font-bold px-5 py-2.5 rounded-full transition">
                            Pakai
                        </button>
                    </div>

                    <!-- Pilihan Voucher Tersedia -->
                    <div class="pt-1 space-y-2">
                        <p class="text-[11px] font-bold text-stone-400">Pilih Voucher Tersedia:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            <button type="button" onclick="selectVoucher('RELOVEDVIBES', 15000)" class="text-left p-2.5 rounded-2xl border border-pink-200 bg-pink-50/50 hover:bg-pink-100 transition flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-extrabold text-stone-900">RELOVEDVIBES</p>
                                    <p class="text-[10px] text-stone-500">Hemat Rp 15.000 (Min. Belanja 50rb)</p>
                                </div>
                                <span class="text-[10px] bg-pink-500 text-white font-bold px-2 py-1 rounded-full">Gunakan</span>
                            </button>
                            <button type="button" onclick="selectVoucher('THRIFTHEMAT', 25000)" class="text-left p-2.5 rounded-2xl border border-amber-200 bg-amber-50/50 hover:bg-amber-100 transition flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-extrabold text-stone-900">THRIFTHEMAT</p>
                                    <p class="text-[10px] text-stone-500">Hemat Rp 25.000 (Min. Belanja 100rb)</p>
                                </div>
                                <span class="text-[10px] bg-amber-500 text-white font-bold px-2 py-1 rounded-full">Gunakan</span>
                            </button>
                        </div>
                    </div>

                    <!-- Alert Voucher Aktif / Tidak Valid -->
                    <div id="voucher-status-box" class="hidden rounded-2xl p-3 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span id="voucher-status-icon" class="w-5 h-5 rounded-full flex items-center justify-center text-xs font-bold"></span>
                            <div>
                                <p id="voucher-title-text" class="text-xs font-bold"></p>
                                <p id="voucher-desc-text" class="text-[10px]"></p>
                            </div>
                        </div>
                        <button type="button" onclick="removeVoucher()" class="text-stone-500 hover:text-red-700 text-xs px-2 font-bold">✕</button>
                    </div>
                </div>

                <!-- Banner Eco Impact (Jejak Karbon) -->
                <div class="bg-[#FEF08A] border border-amber-200 rounded-3xl p-4 flex items-center gap-3 shadow-sm">
                    <div class="w-9 h-9 rounded-full bg-[#3D5236] text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <p class="text-xs text-stone-800 leading-snug">
                        Keren! Dengan checkout <span id="eco-item-count" class="font-extrabold">{{ $itemCount }}</span> item ini, kamu menghemat <strong id="eco-carbon">-{{ number_format($itemCount * 0.8, 1) }} kg jejak karbon</strong> tekstil. 🌿
                    </p>
                </div>
                @endif

            </div>

            <!-- KOLOM KANAN (Ringkasan Belanja) -->
            <div class="space-y-4">
                <div class="bg-white rounded-3xl p-5 border border-pink-100 space-y-3 text-xs sticky top-20 shadow-sm">
                    <h3 class="font-bold text-base text-stone-900 mb-3">Ringkasan Belanja</h3>
                    
                    <div class="flex justify-between text-stone-600">
                        <span>Total Harga (<span id="summary-count">{{ $itemCount }}</span> Item)</span>
                        <span class="font-bold text-stone-900 text-sm" id="subtotal-text">Rp 0</span>
                    </div>

                    <div class="flex justify-between text-stone-600 hidden" id="discount-row">
                        <span>🏷️ Diskon Voucher</span>
                        <span class="font-bold text-stone-900" id="discount-text">-Rp 0</span>
                    </div>

                    <div class="flex justify-between text-stone-600">
                        <span>Ongkir (Reguler Eco-Pack)</span>
                        <span class="font-bold text-stone-900" id="shipping-text">Rp 0</span>
                    </div>

                    <div class="border-t border-stone-100 pt-3 mt-3 flex items-center justify-between">
                        <div>
                            <p class="font-bold text-sm text-stone-900">Total Pembayaran</p>
                            <p class="text-[10px] text-stone-400">Termasuk biaya penanganan</p>
                        </div>
                        <span class="font-extrabold text-lg text-[#EC4899]" id="grand-total-text">Rp 0</span>
                    </div>

                    <!-- Garansi -->
                    <p class="text-center text-[11px] text-stone-500 pt-2 border-t border-stone-100 flex items-center justify-center gap-1">
                        🛡️ Reloved Garansi 100% Terkurasi
                    </p>

                    @if($itemCount > 0)
                    <!-- Tombol Checkout QRIS (Hanya muncul jika ada barang) -->
                    <div class="pt-2 space-y-2" id="checkout-section">
                        <button type="button" id="checkout-btn" class="w-full bg-gradient-to-r from-pink-500 to-[#EC4899] hover:opacity-95 text-white font-bold text-sm py-3.5 rounded-full shadow-md flex items-center justify-center gap-2 transition">
                            <span>⊞ Lanjut ke Checkout QRIS (<span id="btn-count">{{ $itemCount }}</span> Item) →</span>
                        </button>
                        <p class="text-center text-[10px] text-stone-400">*Checkout thrift diproses langsung dari keranjang.</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </main>

    <!-- Bottom Navigation Bar (Sama persis dengan Halaman Beranda & di Tengah Banget) -->
    <!-- Bottom Navigation Bar -->
    <nav class="fixed bottom-0 inset-x-0 bg-white/95 backdrop-blur-md border-t border-pink-100 z-50">
        <div class="max-w-xl mx-auto px-4 h-16 flex items-center justify-around">
            <!-- Belanja -->
            <a href="{{ route('product.index') }}" class="flex flex-col items-center gap-1 transition {{ request()->routeIs('product.index') ? 'text-[#EC4899]' : 'text-stone-400 hover:text-[#EC4899]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <span class="text-[10px] {{ request()->routeIs('product.index') ? 'font-bold' : 'font-semibold' }}">Belanja</span>
            </a>

            <!-- Keranjang -->
            <a href="{{ route('cart.index') }}" class="relative flex flex-col items-center gap-1 transition {{ request()->routeIs('cart.*') ? 'text-[#EC4899]' : 'text-stone-400 hover:text-[#EC4899]' }}">
                <span class="absolute -top-1.5 right-0 bg-[#EC4899] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                    {{ $itemCount ?? 0 }}
                </span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-[10px] {{ request()->routeIs('cart.*') ? 'font-bold' : 'font-semibold' }}">Keranjang</span>
            </a>

            <!-- Pesanan -->
            <a href="{{ route('orders.index') }}" class="flex flex-col items-center gap-1 transition {{ request()->routeIs('orders.*') ? 'text-[#EC4899]' : 'text-stone-400 hover:text-[#EC4899]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span class="text-[10px] {{ request()->routeIs('orders.*') ? 'font-bold' : 'font-semibold' }}">Pesanan</span>
            </a>

            <!-- Akun -->
            <a href="{{ route('profile') }}" class="flex flex-col items-center gap-1 transition {{ request()->routeIs('profile') ? 'text-[#EC4899]' : 'text-stone-400 hover:text-[#EC4899]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] {{ request()->routeIs('profile') ? 'font-bold' : 'font-semibold' }}">Akun</span>
            </a>
        </div>
    </nav>

    <!-- Custom Pop-Up Modal Pink -->
<div id="custom-popup-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-stone-900/35 backdrop-blur-xs transition-opacity duration-200">
    <div id="custom-popup-card" class="w-full max-w-sm bg-[#FFF9FB] border-2 border-pink-200 rounded-[2rem] p-6 shadow-xl shadow-pink-200/60 text-center transform scale-95 transition-all duration-200">
        
        <!-- Ikon Imut di Atas -->
        <div id="popup-icon-wrap" class="w-14 h-14 mx-auto mb-3.5 rounded-2xl bg-pink-100 border border-pink-200 text-[#EC4899] flex items-center justify-center shadow-xs">
            <!-- Diisi otomatis lewat JS -->
        </div>

        <h3 id="popup-title" class="text-base font-extrabold text-stone-900 mb-1">
            Hapus Item Terpilih?
        </h3>
        <p id="popup-message" class="text-xs text-stone-500 leading-relaxed mb-5">
            Yakin mau hapus item dari keranjang?
        </p>

        <!-- Tombol Aksi -->
        <div id="popup-actions" class="flex items-center justify-center gap-2.5">
            <button type="button" id="popup-cancel-btn" class="flex-1 py-2.5 px-4 rounded-full bg-white hover:bg-pink-50 text-stone-600 border border-pink-200 text-xs font-bold transition cursor-pointer">
                Batal
            </button>
            <button type="button" id="popup-confirm-btn" class="flex-1 py-2.5 px-4 rounded-full bg-gradient-to-r from-pink-400 to-[#EC4899] hover:opacity-95 text-white text-xs font-bold shadow-md shadow-pink-200 transition cursor-pointer">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

    <!-- Script JavaScript Kalkulasi, Checkbox, & Validasi Voucher -->
    <!-- Script JavaScript Kalkulasi, Checkbox, & Validasi Voucher -->
    <script>
        let discountAmount = 0;
        const shippingCostPerItem = 12000;

        const validVouchers = {
            'RELOVEDVIBES': 15000,
            'THRIFTHEMAT': 25000
        };

        function formatRupiah(angka) {
            return 'Rp ' + angka.toLocaleString('id-ID');
        }

        function updateSummary() {
            const items = document.querySelectorAll('.cart-item');
            let subtotal = 0;
            let selectedCount = 0;

            items.forEach(item => {
                const checkbox = item.querySelector('.item-checkbox');
                if (checkbox && checkbox.checked) {
                    subtotal += parseInt(item.dataset.price);
                    selectedCount++;
                }
            });

            const activeShipping = selectedCount > 0 ? shippingCostPerItem : 0;
            const grandTotal = Math.max(0, subtotal - discountAmount + activeShipping);

            document.getElementById('summary-count').innerText = selectedCount;
            if (document.getElementById('btn-count')) document.getElementById('btn-count').innerText = selectedCount;
            if (document.getElementById('eco-item-count')) document.getElementById('eco-item-count').innerText = selectedCount;
            if (document.getElementById('eco-carbon')) document.getElementById('eco-carbon').innerText = `-${(selectedCount * 0.8).toFixed(1)} kg jejak karbon`;

            document.getElementById('subtotal-text').innerText = formatRupiah(subtotal);
            document.getElementById('shipping-text').innerText = formatRupiah(activeShipping);

            const discountRow = document.getElementById('discount-row');
            if (discountAmount > 0) {
                discountRow.classList.remove('hidden');
                document.getElementById('discount-text').innerText = '-' + formatRupiah(discountAmount);
            } else {
                discountRow.classList.add('hidden');
            }

            document.getElementById('grand-total-text').innerText = formatRupiah(grandTotal);
        }

        const selectAllCb = document.getElementById('select-all');
        if (selectAllCb) {
            selectAllCb.addEventListener('change', function() {
                document.querySelectorAll('.item-checkbox').forEach(cb => cb.checked = this.checked);
                updateSummary();
            });
        }

        document.querySelectorAll('.item-checkbox').forEach(cb => {
            cb.addEventListener('change', updateSummary);
        });

        function selectVoucher(code, amount) {
            document.getElementById('voucher-input').value = code;
            discountAmount = amount;
            showVoucherAlert(true, code, `Hemat Rp ${amount.toLocaleString('id-ID')} berhasil dipasang!`);
            updateSummary();
        }

        function applyManualVoucher() {
            const code = document.getElementById('voucher-input').value.trim().toUpperCase();
            if (validVouchers.hasOwnProperty(code)) {
                discountAmount = validVouchers[code];
                showVoucherAlert(true, code, `Kode voucher valid! Hemat Rp ${discountAmount.toLocaleString('id-ID')}`);
            } else {
                discountAmount = 0;
                showVoucherAlert(false, code, 'Kode voucher tidak valid atau sudah kedaluwarsa.');
            }
            updateSummary();
        }

        function showVoucherAlert(isValid, code, message) {
            const box = document.getElementById('voucher-status-box');
            const icon = document.getElementById('voucher-status-icon');
            const title = document.getElementById('voucher-title-text');
            const desc = document.getElementById('voucher-desc-text');

            box.classList.remove('hidden');
            if (isValid) {
                box.className = "rounded-2xl p-3 flex items-center justify-between bg-emerald-50 border border-emerald-200";
                icon.className = "w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold";
                icon.innerText = "✓";
                title.className = "text-xs font-bold text-emerald-900";
                title.innerText = `${code} - Terpasang`;
                desc.className = "text-[10px] text-emerald-700";
                desc.innerText = message;
            } else {
                box.className = "rounded-2xl p-3 flex items-center justify-between bg-rose-50 border border-rose-200";
                icon.className = "w-5 h-5 rounded-full bg-rose-500 text-white flex items-center justify-center text-xs font-bold";
                icon.innerText = "✕";
                title.className = "text-xs font-bold text-rose-900";
                title.innerText = `${code || 'KOSONG'} - Tidak Valid`;
                desc.className = "text-[10px] text-rose-700";
                desc.innerText = message;
                discountAmount = 0;
            }
        }

        function removeVoucher() {
            discountAmount = 0;
            document.getElementById('voucher-input').value = '';
            document.getElementById('voucher-status-box').classList.add('hidden');
            updateSummary();
        }

        function openPinkPopup({ title, message, type = 'confirm', confirmText = 'Ya, Hapus', onConfirm = null }) {
            const modal = document.getElementById('custom-popup-modal');
            const card = document.getElementById('custom-popup-card');
            const iconWrap = document.getElementById('popup-icon-wrap');
            const titleEl = document.getElementById('popup-title');
            const msgEl = document.getElementById('popup-message');
            const cancelBtn = document.getElementById('popup-cancel-btn');
            const confirmBtn = document.getElementById('popup-confirm-btn');

            titleEl.innerText = title;
            msgEl.innerText = message;
            confirmBtn.innerText = confirmText;

            if (type === 'alert') {
                cancelBtn.classList.add('hidden');
                iconWrap.innerHTML = `
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                `;
            } else {
                cancelBtn.classList.remove('hidden');
                iconWrap.innerHTML = `
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                `;
            }

            function closePopup() {
                card.classList.remove('scale-100');
                card.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 150);
            }

            cancelBtn.onclick = closePopup;
            modal.onclick = (e) => {
                if (e.target === modal) closePopup();
            };

            confirmBtn.onclick = () => {
                closePopup();
                if (typeof onConfirm === 'function') onConfirm();
            };

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            requestAnimationFrame(() => {
                card.classList.remove('scale-95');
                card.classList.add('scale-100');
            });
        }

        function deleteSelected() {
            const selectedIds = [];
            document.querySelectorAll('.cart-item').forEach(item => {
                const checkbox = item.querySelector('.item-checkbox');
                if (checkbox && checkbox.checked) {
                    selectedIds.push(item.dataset.id);
                }
            });

            if (selectedIds.length === 0) {
                openPinkPopup({
                    title: 'Belum Ada yang Dipilih',
                    message: 'Centang dulu minimal 1 barang di keranjang yang mau dihapus ya!',
                    type: 'alert',
                    confirmText: 'Oke, Mengerti'
                });
                return;
            }

            openPinkPopup({
                title: 'Hapus Item Terpilih?',
                message: `Yakin mau hapus ${selectedIds.length} item terpilih dari keranjang?`,
                type: 'confirm',
                confirmText: 'Ya, Hapus',
                onConfirm: () => {
                    const container = document.getElementById('selected-ids-container');
                    container.innerHTML = '';

                    selectedIds.forEach(id => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = id;
                        container.appendChild(input);
                    });

                    document.getElementById('delete-selected-form').submit();
                }
            });
        }

        updateSummary();
    </script>
</body>
</html>
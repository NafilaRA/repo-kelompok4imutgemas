<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan - {{ $order->invoice_number }} | Reloved</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fdf6f8] text-stone-800 antialiased">
    @php
        $shipStatus = $order->shipping_status;
        $payStatus = $order->payment_status;

        // Menentukan tahap aktif (1 s/d 4) berdasarkan status
        if ($shipStatus === 'completed') {
            $step = 4;
            $badgeText = 'Selesai';
            $badgeClass = 'bg-emerald-100 text-emerald-700';
            $etaText = 'Paket Telah Diterima';
            $etaDesc = 'Pesanan preloved kamu sudah diterima. Terima kasih sudah berbelanja di Reloved!';
        } elseif ($shipStatus === 'shipping') {
            $step = 3;
            $badgeText = 'Dalam Perjalanan';
            $badgeClass = 'bg-pink-100 text-pink-600';
            $etaText = 'Dalam Pengiriman Kurir';
            $etaDesc = 'Paket preloved kamu sedang dalam perjalanan menuju ' . $order->shipping_address . '.';
        } elseif ($payStatus === 'paid') {
            $step = 2;
            $badgeText = 'Dikemas';
            $badgeClass = 'bg-amber-100 text-amber-800';
            $etaText = 'Sedang Dikemas';
            $etaDesc = 'Pembayaran terverifikasi! Pesanan sedang dikemas rapi sebelum dikirim ke tujuan.';
        } else {
            $step = 1;
            $badgeText = 'Menunggu Pembayaran';
            $badgeClass = 'bg-rose-100 text-rose-700';
            $etaText = 'Menunggu Pembayaran';
            $etaDesc = 'Silakan selesaikan pembayaran dan unggah bukti transfer/QRIS agar pesanan segera diproses.';
        }

        $resi = $order->tracking_number ?: ('RLV-' . $order->invoice_number);
    @endphp

    <div class="max-w-md mx-auto min-h-screen bg-[#fdf6f8] pb-28">
        {{-- Top Header --}}
        <header class="sticky top-0 z-30 bg-white/95 backdrop-blur border-b border-pink-100 px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <a href="{{ route('orders.index') }}" class="w-8 h-8 rounded-full bg-pink-50 text-pink-600 flex items-center justify-center hover:bg-pink-100 transition" title="Kembali">
                    &larr;
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-sm text-stone-900">Reloved</span>
                        <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full bg-pink-100 text-pink-600">
                            Worn &amp; Loved
                        </span>
                    </div>
                    <p class="text-[11px] text-stone-500">Lacak Pesanan &bull; {{ $order->invoice_number }}</p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('orders.index') }}" class="w-8 h-8 rounded-full bg-pink-50 text-pink-500 flex items-center justify-center text-sm hover:bg-pink-100 transition">
                    &hearts;
                </a>
                <a href="{{ route('profile') }}" class="w-8 h-8 rounded-full bg-stone-200 text-stone-700 flex items-center justify-center text-xs font-bold overflow-hidden">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </a>
            </div>
        </header>

        <div class="px-4 pt-4 space-y-4">
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-3.5 py-2.5 rounded-2xl text-xs font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-3.5 py-2.5 rounded-2xl text-xs font-medium">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Card Ekspedisi & Nomor Resi --}}
            <div class="bg-white rounded-2xl p-4 border border-pink-100 shadow-sm">
                <div class="flex items-center justify-between gap-2 mb-3">
                    <div class="flex items-center gap-2 text-xs font-bold text-stone-800">
                        <span class="w-6 h-6 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center text-xs">&#128666;</span>
                        <span>{{ $order->tracking_number ? 'Pengiriman Terdaftar' : 'Reloved Express' }}</span>
                    </div>
                    <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }}">
                        {{ $badgeText }}
                    </span>
                </div>

                <div class="flex items-center justify-between gap-2 bg-pink-50/60 rounded-xl p-3 border border-pink-100">
                    <div class="min-w-0">
                        <p class="text-[10px] text-stone-400 font-medium">Nomor Resi</p>
                        <p id="resiText" class="text-xs sm:text-sm font-bold text-stone-900 truncate">
                            {{ $resi }}
                        </p>
                    </div>
                    <button type="button" onclick="copyResi()"
                            class="shrink-0 px-3 py-1.5 rounded-xl bg-amber-100 hover:bg-amber-200 text-amber-900 text-xs font-semibold transition">
                        Salin Resi
                    </button>
                </div>
                <p id="copyToast" class="text-[11px] text-emerald-600 font-medium mt-1.5 hidden">Nomor resi berhasil disalin!</p>
            </div>

            {{-- Card Perkiraan Paket Tiba --}}
            <div class="bg-amber-50/90 border border-amber-200/80 rounded-2xl p-4 shadow-sm">
                <div class="flex items-start justify-between gap-2 mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-amber-900 text-amber-100 flex items-center justify-center text-xs">&#128336;</span>
                        <span class="text-[10px] font-bold tracking-wider uppercase text-amber-800">Perkiraan Paket Tiba</span>
                    </div>
                    <span class="text-[10px] font-semibold bg-white/90 text-stone-700 px-2.5 py-1 rounded-full border border-amber-200">
                        Estimasi 1–3 Hari
                    </span>
                </div>
                <p class="text-base font-extrabold text-stone-900 mt-1">{{ $etaText }}</p>
                <p class="text-xs text-stone-600 mt-1 leading-relaxed">{{ $etaDesc }}</p>
            </div>

            {{-- Card Rute Pengiriman (4 Tahap) --}}
            <div class="bg-white rounded-2xl p-4 border border-pink-100 shadow-sm space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xs font-bold text-stone-800 flex items-center gap-1.5">
                        <span class="text-pink-500">&#128205;</span>
                        <span>Rute Pengiriman</span>
                    </h2>
                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-pink-50 text-pink-600">
                        Tahap {{ $step }} dari 4
                    </span>
                </div>

                {{-- Stepper 4 Langkah --}}
                @php
                    $steps = [
                        ['num' => 1, 'title' => 'Diproses', 'sub' => 'Pesanan'],
                        ['num' => 2, 'title' => 'Dikemas', 'sub' => 'Gudang'],
                        ['num' => 3, 'title' => 'Dikirim', 'sub' => 'Kurir'],
                        ['num' => 4, 'title' => 'Sampai', 'sub' => 'Tujuan'],
                    ];
                @endphp
                <div class="grid grid-cols-4 gap-1 text-center pt-1">
                    @foreach($steps as $s)
                        @php $done = $step >= $s['num']; @endphp
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold transition
                                {{ $done ? 'bg-pink-500 text-white shadow-sm' : 'bg-stone-100 text-stone-400' }}">
                                {{ $s['num'] }}
                            </div>
                            <span class="text-[11px] font-bold mt-1.5 {{ $done ? 'text-stone-800' : 'text-stone-400' }}">
                                {{ $s['title'] }}
                            </span>
                            <span class="text-[10px] text-stone-400">{{ $s['sub'] }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Alamat Tujuan --}}
                <div class="rounded-xl bg-rose-50/70 border border-pink-100 p-3 flex items-center justify-between gap-2">
                    <div class="text-xs min-w-0">
                        <p class="text-[10px] text-stone-400 font-semibold uppercase">Alamat Tujuan</p>
                        <p class="font-semibold text-stone-800 truncate">{{ $order->shipping_address }}</p>
                    </div>
                    <span class="shrink-0 text-[11px] font-bold px-2.5 py-1 rounded-full bg-white text-pink-600 border border-pink-100">
                        {{ strtoupper($payStatus) }}
                    </span>
                </div>
            </div>

            {{-- Card Riwayat Perjalanan --}}
            <div class="bg-white rounded-2xl p-4 border border-pink-100 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xs font-bold text-stone-800">Riwayat Perjalanan</h2>
                    <span class="text-[10px] text-stone-400 font-medium">Status Terkini</span>
                </div>

                <div class="space-y-3.5 border-l-2 border-pink-200 ml-2 pl-4 text-xs">
                    @if($shipStatus === 'completed')
                        <div class="relative">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 absolute -left-[21px] top-1 ring-4 ring-emerald-100"></span>
                            <p class="text-[10px] font-bold text-emerald-600">{{ $order->updated_at->format('d M Y, H:i') }} WIB &bull; Selesai</p>
                            <p class="font-semibold text-stone-800 mt-0.5">Paket telah diterima di alamat tujuan.</p>
                        </div>
                    @endif

                    @if(in_array($shipStatus, ['shipping', 'completed']))
                        <div class="relative">
                            <span class="w-2.5 h-2.5 rounded-full bg-pink-500 absolute -left-[21px] top-1 ring-4 ring-pink-100"></span>
                            <p class="text-[10px] font-bold text-pink-600">Dalam Pengiriman &bull; Resi: {{ $resi }}</p>
                            <p class="font-semibold text-stone-800 mt-0.5">Paket sedang dikirim menuju {{ $order->shipping_address }}.</p>
                        </div>
                    @endif

                    @if($payStatus === 'paid' || in_array($shipStatus, ['shipping', 'completed']))
                        <div class="relative">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500 absolute -left-[21px] top-1"></span>
                            <p class="text-[10px] font-semibold text-stone-400">Pembayaran Terverifikasi</p>
                            <p class="text-stone-700 mt-0.5">Pembayaran sebesar <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong> telah diterima dan pesanan dikemas.</p>
                        </div>
                    @endif

                    <div class="relative">
                        <span class="w-2.5 h-2.5 rounded-full bg-stone-300 absolute -left-[21px] top-1"></span>
                        <p class="text-[10px] font-semibold text-stone-400">{{ $order->created_at->format('d M Y, H:i') }} WIB</p>
                        <p class="text-stone-700 mt-0.5">Pesanan <strong>{{ $order->invoice_number }}</strong> berhasil dibuat.</p>
                    </div>
                </div>
            </div>

            {{-- Card Isi Paket Reloved --}}
            <div class="bg-white rounded-2xl p-4 border border-pink-100 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xs font-bold text-stone-800">Isi Paket Reloved ({{ $order->orderItems->count() }} Item)</h2>
                        <p class="text-[10px] text-stone-400">Dipilih dengan cinta dari kurasi preloved</p>
                    </div>
                </div>

                <div class="space-y-2.5">
                    @foreach($order->orderItems as $item)
                        <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl bg-pink-50/50 border border-pink-100/80">
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-stone-800 truncate">
                                    {{ $item->product->name ?? ($item->product->title ?? 'Item Preloved') }}
                                </p>
                                <p class="text-[10px] text-stone-500">
                                    {{ $item->product->condition ?? 'Preloved' }}
                                    @if(!empty($item->product->size))
                                        &bull; Size {{ $item->product->size }}
                                    @endif
                                </p>
                            </div>
                            <span class="text-xs font-bold text-pink-600 shrink-0">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-between pt-2.5 border-t border-pink-100">
                    <span class="text-xs font-semibold text-stone-500">Total Pembayaran</span>
                    <span class="text-sm font-extrabold text-stone-900">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- Card Bukti Pembayaran (Transfer / QRIS) --}}
            <div class="bg-white rounded-2xl p-4 border border-pink-100 shadow-sm space-y-3">
                <h2 class="text-xs font-bold text-stone-800">Bukti Pembayaran (Transfer / QRIS)</h2>

                @if($order->payment_proof)
                    <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" class="w-40 rounded-xl border border-pink-100">
                @else
                    <p class="text-xs text-stone-400">Belum ada bukti pembayaran yang diunggah.</p>
                @endif

                @if($order->payment_status === 'pending')
                    <form action="{{ route('orders.uploadProof', $order->id) }}" method="POST" enctype="multipart/form-data" class="space-y-2.5 pt-1">
                        @csrf
                        <input type="file" name="payment_proof" accept="image/*" required class="block w-full text-xs text-stone-600">
                        @error('payment_proof')
                            <p class="text-[11px] text-red-600">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-pink-500 hover:bg-pink-600 text-white text-xs font-bold transition">
                            Upload Bukti Pembayaran
                        </button>
                    </form>
                @endif
            </div>

            {{-- Tombol Aksi Utama (Konfirmasi Terima Barang & Hubungi CS) --}}
            <div class="space-y-2.5 pt-1">
                @if($order->shipping_status === 'shipping')
                    <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-pink-500 to-rose-500 hover:opacity-95 text-white text-xs font-bold shadow-sm transition">
                            &#10003; Konfirmasi Terima Barang
                        </button>
                    </form>
                @endif

                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo CS Reloved, saya ingin menanyakan pesanan ' . $order->invoice_number) }}"
                   target="_blank" rel="noopener"
                   class="w-full py-3.5 rounded-2xl bg-[#4a192c] hover:bg-[#381221] text-white text-xs font-bold flex items-center justify-center gap-2 transition">
                    <span>&#128172; Hubungi CS WhatsApp (Tanya Kurir)</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Navigation Bar --}}
    <nav class="fixed bottom-0 inset-x-0 z-50 bg-white border-t border-pink-100">
        <div class="max-w-md mx-auto grid grid-cols-5 py-2">
            <a href="{{ route('product.index') }}" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-[10px] font-semibold">Belanja</span>
            </a>

            <a href="{{ route('product.index') }}#katalog" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="text-[10px] font-semibold">Katalog</span>
            </a>

            <a href="{{ route('cart.index') }}" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-[10px] font-semibold">Keranjang</span>
            </a>

            <a href="{{ route('orders.index') }}" class="flex flex-col items-center gap-1 text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span class="text-[10px] font-semibold">Pesanan</span>
            </a>

            <a href="{{ route('profile') }}" class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] font-semibold">Akun</span>
            </a>
        </div>
    </nav>

    <script>
        function copyResi() {
            const text = document.getElementById('resiText')?.innerText?.trim();
            if (!text) return;
            navigator.clipboard?.writeText(text);
            const toast = document.getElementById('copyToast');
            if (toast) {
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 2000);
            }
        }
    </script>
</body>
</html>
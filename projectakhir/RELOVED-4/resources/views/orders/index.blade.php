<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800">
    @php
        $activeTab = request('tab', 'all');

        $tabs = [
            'all'        => 'Semua',
            'unpaid'     => 'Belum Bayar',
            'processing' => 'Dikemas',
            'shipping'   => 'Dikirim',
            'completed'  => 'Selesai',
            'return'     => 'Pengembalian',
            'cancelled'  => 'Dibatalkan',
        ];

        $matchTab = function ($order, $tab) {
            $pay = $order->payment_status;
            $ship = $order->shipping_status;

            return match ($tab) {
                'unpaid'     => $pay === 'pending' && $ship !== 'cancelled',
                'processing' => $pay === 'paid' && $ship === 'processing',
                'shipping'   => $ship === 'shipping',
                'completed'  => $ship === 'completed',
                'return'     => $ship === 'return',
                'cancelled'  => $pay === 'failed' || $ship === 'cancelled',
                default      => true,
            };
        };

        $filteredOrders = $orders->filter(fn ($order) => $matchTab($order, $activeTab));

        $getStatusLabel = function ($order) {
            if ($order->payment_status === 'failed' || $order->shipping_status === 'cancelled') {
                return ['Dibatalkan', 'bg-red-100 text-red-700'];
            }
            if ($order->shipping_status === 'return') {
                return ['Pengembalian', 'bg-purple-100 text-purple-700'];
            }
            if ($order->shipping_status === 'completed') {
                return ['Selesai', 'bg-emerald-100 text-emerald-700'];
            }
            if ($order->shipping_status === 'shipping') {
                return ['Dikirim', 'bg-blue-100 text-blue-700'];
            }
            if ($order->payment_status === 'paid' && $order->shipping_status === 'processing') {
                return ['Dikemas', 'bg-amber-100 text-amber-800'];
            }
            return ['Belum Bayar', 'bg-pink-100 text-pink-700'];
        };
    @endphp

    <div class="max-w-4xl mx-auto px-4 pt-6 pb-24">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-bold text-stone-900">Pesanan Saya</h1>
            <a href="{{ route('product.index') }}" class="text-xs font-medium text-pink-600 hover:underline">
                + Belanja Lagi
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tab Filter Status --}}
        <div class="bg-white border border-stone-200 rounded-xl mb-5 overflow-x-auto">
            <div class="flex min-w-max border-b border-stone-100">
                @foreach($tabs as $key => $label)
                    @php
                        $count = $key === 'all'
                            ? $orders->count()
                            : $orders->filter(fn ($o) => $matchTab($o, $key))->count();
                        $isActive = $activeTab === $key;
                    @endphp
                    <a href="{{ route('orders.index', $key === 'all' ? [] : ['tab' => $key]) }}"
                       class="px-4 py-3 text-xs sm:text-sm font-semibold whitespace-nowrap border-b-2 transition flex items-center gap-1.5
                       {{ $isActive ? 'border-pink-500 text-pink-600' : 'border-transparent text-stone-500 hover:text-stone-800' }}">
                        <span>{{ $label }}</span>
                        @if($count > 0)
                            <span class="px-1.5 py-0.5 text-[10px] rounded-full {{ $isActive ? 'bg-pink-100 text-pink-600' : 'bg-stone-100 text-stone-600' }}">
                                {{ $count }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Daftar Pesanan --}}
        @forelse($filteredOrders as $order)
            @php
                [$badgeText, $badgeClass] = $getStatusLabel($order);
            @endphp

            <div class="bg-white border border-stone-200 rounded-2xl p-4 mb-4 shadow-sm">
                {{-- Header Invoice & Status --}}
                <div class="flex flex-wrap items-center justify-between gap-2 pb-3 mb-3 border-b border-stone-100">
                    <div>
                        <span class="text-sm font-bold text-stone-800">{{ $order->invoice_number }}</span>
                        <span class="text-xs text-stone-400 ml-2">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClass }}">
                        {{ $badgeText }}
                    </span>
                </div>

                {{-- Daftar Item --}}
                <div class="space-y-2 pb-3 mb-3 border-b border-stone-100">
                    @foreach($order->orderItems as $item)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-stone-700 font-medium">
                                {{ $item->product->name ?? ($item->product->title ?? 'Produk Preloved') }}
                            </span>
                            <span class="text-stone-800 font-semibold">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Resi (jika ada) & Total + Tombol Aksi --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <p class="text-xs text-stone-400">Total Pesanan</p>
                        <p class="text-base font-bold text-stone-900">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </p>
                        @if($order->tracking_number)
                            <p class="text-xs text-stone-500 mt-0.5">
                                No. Resi: <span class="font-semibold text-stone-700">{{ $order->tracking_number }}</span>
                            </p>
                        @endif
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('orders.show', $order->id) }}"
                           class="px-4 py-2 text-xs font-semibold rounded-xl border border-pink-500 text-pink-600 hover:bg-pink-50 transition">
                            Lacak Pesanan
                        </a>
                        <a href="{{ route('orders.show', $order->id) }}"
                           class="px-4 py-2 text-xs font-semibold rounded-xl bg-pink-500 text-white hover:bg-pink-600 transition">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white border border-stone-200 rounded-2xl p-10 text-center">
                <p class="text-sm font-medium text-stone-600 mb-1">
                    Belum ada pesanan di tab "{{ $tabs[$activeTab] ?? 'Semua' }}".
                </p>
                <p class="text-xs text-stone-400 mb-4">
                    Yuk cek katalog dan temukan item preloved favoritmu!
                </p>
                <a href="{{ route('product.index') }}"
                   class="inline-block px-4 py-2 text-xs font-semibold rounded-xl bg-pink-500 text-white hover:bg-pink-600 transition">
                    Mulai Belanja
                </a>
            </div>
        @endforelse
    </div>

    {{-- Bottom Navigation Bar --}}
    <nav class="fixed bottom-0 inset-x-0 z-50 bg-white border-t border-stone-200">
        <div class="max-w-4xl mx-auto grid grid-cols-5 py-2">
            <a href="{{ route('product.index') }}"
               class="flex flex-col items-center gap-1 {{ request()->routeIs('product.index') ? 'text-pink-500' : 'text-stone-400' }} hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-[10px] font-semibold">Belanja</span>
            </a>

            <a href="{{ route('product.index') }}#katalog"
               class="flex flex-col items-center gap-1 text-stone-400 hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="text-[10px] font-semibold">Katalog</span>
            </a>

            <a href="{{ route('cart.index') }}"
               class="flex flex-col items-center gap-1 {{ request()->routeIs('cart.*') ? 'text-pink-500' : 'text-stone-400' }} hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-[10px] font-semibold">Keranjang</span>
            </a>

            <a href="{{ route('orders.index') }}"
               class="flex flex-col items-center gap-1 {{ request()->routeIs('orders.*') ? 'text-pink-500' : 'text-stone-400' }} hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span class="text-[10px] font-semibold">Pesanan</span>
            </a>

            <a href="{{ route('profile') }}"
               class="flex flex-col items-center gap-1 {{ request()->routeIs('profile') ? 'text-pink-500' : 'text-stone-400' }} hover:text-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] font-semibold">Akun</span>
            </a>
        </div>
    </nav>
</body>
</html>
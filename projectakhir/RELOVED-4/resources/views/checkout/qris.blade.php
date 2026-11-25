<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport"/>
    <meta content="mobile_stack" name="shell-type"/>
    <title>Checkout Pembayaran QRIS - Reloved</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <style>
        @layer base {
            html, body {
                width: 100vw;
                margin: 0;
                padding: 0;
                background-color: #fdf9f2;
            }
            body {
                overscroll-behavior: none;
            }
            .pb-safe {
                padding-bottom: env(safe-area-inset-bottom, 0px);
            }
            .pt-safe {
                padding-top: env(safe-area-inset-top, 0px);
            }
            main > :first-child {
                margin-top: 0 !important;
            }
            main > :last-child {
                margin-bottom: 0 !important;
            }
        }
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary-container": "#544603",
                        "on-primary-fixed": "#351009",
                        "secondary-fixed-dim": "#b9cda4",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "inverse-primary": "#fbb6a8",
                        "tertiary-fixed": "#f8e291",
                        "surface": "#fdf9f2",
                        "on-primary-container": "#6a3930",
                        "inverse-surface": "#31302c",
                        "outline": "#847370",
                        "surface-dim": "#dddad3",
                        "on-secondary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#544602",
                        "tertiary": "#6d5d1b",
                        "surface-container-low": "#f7f3ec",
                        "tertiary-fixed-dim": "#dbc678",
                        "secondary": "#526442",
                        "on-surface": "#1c1c18",
                        "on-primary-fixed-variant": "#6a3930",
                        "on-secondary-container": "#576846",
                        "on-background": "#1c1c18",
                        "surface-tint": "#865046",
                        "error": "#ba1a1a",
                        "surface-container-high": "#ebe8e1",
                        "tertiary-container": "#c9b569",
                        "on-tertiary-fixed": "#221b00",
                        "secondary-container": "#d2e6bc",
                        "inverse-on-surface": "#f4f0e9",
                        "background": "#fdf9f2",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed": "#111f05",
                        "secondary-fixed": "#d5e9bf",
                        "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#524341",
                        "surface-container-highest": "#e6e2db",
                        "primary-fixed-dim": "#fbb6a8",
                        "surface-variant": "#e6e2db",
                        "primary": "#865046",
                        "surface-container": "#f1ede6",
                        "surface-bright": "#fdf9f2",
                        "primary-container": "#e8a598",
                        "outline-variant": "#d7c2be",
                        "on-secondary-fixed-variant": "#3b4c2c",
                        "primary-fixed": "#ffdad3"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "space-lg": "1.25rem",
                        "gutter-md": "1rem",
                        "space-xs": "0.25rem",
                        "space-xl": "2rem",
                        "margin-md": "1.5rem",
                        "margin": "1rem",
                        "gutter": "0.75rem",
                        "space-md": "0.875rem",
                        "space-sm": "0.5rem"
                    },
                    fontFamily: {
                        "body-sm": ["Plus Jakarta Sans"],
                        "label-lg": ["Plus Jakarta Sans"],
                        "headline-xl": ["Bricolage Grotesque"],
                        "headline-sm": ["Bricolage Grotesque"],
                        "headline-lg": ["Bricolage Grotesque"],
                        "label-md": ["Plus Jakarta Sans"],
                        "headline-lg-mobile": ["Bricolage Grotesque"],
                        "label-sm": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "headline-xl-mobile": ["Bricolage Grotesque"],
                        "headline-md": ["Bricolage Grotesque"],
                        "body-lg": ["Plus Jakarta Sans"]
                    },
                    fontSize: {
                        "body-sm": ["12px", { "lineHeight": "16px", "fontWeight": "400" }],
                        "label-lg": ["14px", { "lineHeight": "18px", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "headline-xl": ["36px", { "lineHeight": "42px", "letterSpacing": "-0.03em", "fontWeight": "700" }],
                        "headline-sm": ["17px", { "lineHeight": "22px", "fontWeight": "600" }],
                        "headline-lg": ["28px", { "lineHeight": "34px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }],
                        "headline-lg-mobile": ["22px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "700" }],
                        "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "headline-xl-mobile": ["28px", { "lineHeight": "34px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["20px", { "lineHeight": "26px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }]
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-surface font-body-md text-on-surface flex flex-col min-h-screen">
    <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.03)]">
        <div class="h-14 px-margin flex items-center justify-between gap-space-sm">
            <div class="flex items-center gap-space-xs min-w-0">
                <button aria-label="Go Back" class="w-11 h-11 -ml-2 rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors" onclick="history.back()" type="button">
                    <span class="material-symbols-outlined text-[22px]">arrow_back</span>
                </button>
                <img alt="Reloved Logo" class="h-7 w-auto object-contain flex-shrink-0 hidden sm:block" src="{{ asset('images/icon/logo-reloved.jpeg') }}"/>
                <h1 class="font-headline-sm text-headline-sm truncate" style="color: #44113E;">Checkout Pembayaran QRIS</h1>
            </div>
            <div class="flex items-center gap-space-xs flex-shrink-0">
                <button aria-label="Share" class="w-11 h-11 rounded-full flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors" type="button">
                    <span class="material-symbols-outlined text-[20px]">share</span>
                </button>
                @auth
                    <img alt="Profile" class="w-8 h-8 rounded-full object-cover ring-2 ring-primary-container/40" src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ Auth::user()->name }}"/>
                @else
                    <img alt="Profile" class="w-8 h-8 rounded-full object-cover ring-2 ring-primary-container/40" src="https://api.dicebear.com/7.x/avataaars/svg?seed=Reloved"/>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1 flex flex-col relative w-full pt-14 pb-safe bg-surface">
        <div class="flex flex-col w-full pb-10">
            <div class="px-margin pt-space-md pb-space-xs flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">eco</span>
                    <span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Checkout Berkelanjutan</span>
                </div>
                <div class="inline-flex items-center gap-1 bg-tertiary-fixed text-on-tertiary-container px-2 py-0.5 rounded-full shadow-sm">
                    <span class="material-symbols-outlined text-[14px]">lock</span>
                    <span class="font-label-sm text-label-sm">Enkripsi 256-Bit</span>
                </div>
            </div>

            <!-- Alamat Pengiriman -->
            <section class="px-margin mt-space-sm">
                <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
                    <div class="flex items-center justify-between mb-space-xs">
                        <div class="flex items-center gap-space-xs text-on-surface">
                            <span class="material-symbols-outlined text-primary text-[20px]">pin_drop</span>
                            <span class="font-headline-sm text-headline-sm">Alamat Pengiriman</span>
                        </div>
                        <button class="bg-surface-container-high text-primary hover:bg-primary-container/30 px-space-sm py-1 rounded-full font-label-md text-label-md transition-colors" type="button">
                            Ubah Alamat
                        </button>
                    </div>
                    <div class="bg-surface-container-low rounded-lg p-space-sm mt-space-xs">
                        <div class="flex items-center gap-space-xs">
                            <span class="font-label-lg text-label-lg text-on-surface">{{ Auth::user()->name ?? 'Nadia Salsabila' }}</span>
                            <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2 py-0.5 rounded-full">Utama</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ Auth::user()->phone ?? '+62 812-3456-7890' }}</p>
                        <p class="font-body-md text-body-md text-on-surface mt-1 leading-snug">
                            Jl. Kemang Raya No. 42B, Mampang Prapatan, Jakarta Selatan 12730
                        </p>
                        <div class="flex items-center gap-1 mt-2 text-secondary">
                            <span class="material-symbols-outlined text-[16px]">local_shipping</span>
                            <span class="font-body-sm text-body-sm">Kurir Rekomendasi: SiCepat Eco (Gratis Ongkir Vintage)</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ringkasan Pesanan -->
            <section class="px-margin mt-space-md">
                <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
                    <div class="flex items-center justify-between mb-space-sm">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[20px]">checkroom</span>
                            <span class="font-headline-sm text-headline-sm text-on-surface">Ringkasan Pesanan</span>
                        </div>
                        <span class="bg-primary-container text-on-primary-container font-label-sm text-label-sm px-2.5 py-0.5 rounded-full">
                            3 Pilihan Thrift
                        </span>
                    </div>
                    <div class="space-y-space-xs">
                        <div class="flex items-center gap-space-sm p-space-xs bg-surface-container-low rounded-lg">
                            <img class="w-14 h-14 object-cover rounded-lg flex-shrink-0" alt="Vintage Knit Cream" src="https://lh3.googleusercontent.com/aida-public/AB6AXuClMcTB_RJjqE2kzxoVgns0Xix_Gt1HKw0ps0ysbPKhZTpf63e_9ALDzAEcQchN8XMbPUT2PYDdbYRismjKUpXXVcvOwDjWMsAq-bNobDp8dH58NAayXHT61n9nIHrDLECP_JTOBG8kXzXWe4UUAEDgBoxPjCwpUrwCUmWzDU1LMXegRpiCZygP6uyguSyISN2OFrZI-23yDiRlXD6UrYOYcyPO9MYE7TR7J-2EREDi"/>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-label-lg text-label-lg text-on-surface truncate">Vintage Knit Cream</h3>
                                    <span class="font-label-lg text-label-lg text-on-surface">Rp 89.000</span>
                                </div>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-1.5 py-0.5 rounded">Size M</span>
                                    <span class="font-body-sm text-body-sm text-secondary">Pristine Vintage</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-space-sm p-space-xs bg-surface-container-low rounded-lg">
                            <img class="w-14 h-14 object-cover rounded-lg flex-shrink-0" alt="Sage Oversized Sweater" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKDb9F6ee59cCvymlKJVh0mwz7FOm905In7Mx4nVq_3rPnxsL90NjJTTPRzRv0Pr4m6OJ8Vvei4kt7JL-B3Lp_PXNDUqYx2cViNSfe5vpW60wxubpGBIHLj-UFQ40LAbEwgdwYpQlOjbeno2Tkkz4y9LCCs-CKS1QsMeLQQksntTot02twIjfbHblPW0PPUKt0zvJAfX0w3KpSrj9EUvpT0Z-XuCLrpYoTomv5uGqy"/>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-label-lg text-label-lg text-on-surface truncate">Sage Oversized Sweater</h3>
                                    <span class="font-label-lg text-label-lg text-on-surface">Rp 85.000</span>
                                </div>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-1.5 py-0.5 rounded">Size Free</span>
                                    <span class="font-body-sm text-body-sm text-secondary">Very Good</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-space-sm p-space-xs bg-surface-container-low rounded-lg">
                            <img class="w-14 h-14 object-cover rounded-lg flex-shrink-0" alt="90s Ribbed Tank Blossom" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbPyeVDmYusxFwwA2eMcnIzpfGQQpWRjkvsFMe7MWd1LpP3-Y2H7Ie5B9GJRSAsZON4iU70MJGNttL42pSpoCzhoUDSxMhiNfn5DahM_cPizIR6pHf-VR8dF4GRNGRKSUNCmmeAI7rLtzcj-kRcVSV1zmYNkUQNzUaem5GjTgEyELTFWOYD8_c3rjOlUuGnXHmx7NZ7PPXAdnGMARrvBhwDvCmQik7geXRGr7kTDRJ"/>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-label-lg text-label-lg text-on-surface truncate">90s Ribbed Tank Blossom</h3>
                                    <span class="font-label-lg text-label-lg text-on-surface">Rp 45.000</span>
                                </div>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-1.5 py-0.5 rounded">Size S</span>
                                    <span class="font-body-sm text-body-sm text-secondary">Mint Condition</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-space-sm pt-space-xs flex items-center justify-between bg-secondary-container/40 p-2.5 rounded-lg">
                        <div class="flex items-center gap-1.5 text-on-secondary-container">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span class="font-label-md text-label-md">Pesanan diverifikasi dari keranjang belanja</span>
                        </div>
                        <span class="font-headline-sm text-headline-sm text-on-surface">Rp 219.000</span>
                    </div>
                </div>
            </section>

            <!-- QRIS Payment -->
            <section class="px-margin mt-space-md">
                <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-md">
                    <div class="rounded-xl p-space-sm text-center" style="background-color: #FFF7AD; border: 1.5px solid #FFB3AE;">
                        <span class="px-2.5 py-1 rounded-full uppercase tracking-wide inline-flex items-center gap-1 font-label-sm text-label-sm" style="background-color: #6A1452; color: #FFF7AD;">
                            <span class="material-symbols-outlined text-[14px]">bolt</span>Metode Pembayaran Resmi
                        </span>
                        <h2 class="font-headline-sm text-headline-sm mt-1" style="color: #44113E;">QRIS (Instant Confirmation)</h2>
                        <p class="font-body-sm text-body-sm mt-0.5" style="color: #44113E;">Scan cepat, pesanan langsung kami kemas tanpa upload bukti transfer</p>
                    </div>

                    <div class="mt-space-md flex flex-col items-center">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full mb-space-sm shadow-sm" style="background-color: #FFF7AD; color: #44113E; border: 1px solid #FFB3AE;">
                            <span class="material-symbols-outlined text-[16px] animate-pulse" style="color: #44113E;">timer</span>
                            <span class="font-label-md text-label-md">Selesaikan dalam <span class="font-bold" id="countdown">07:45</span> menit</span>
                        </div>

                        <div class="relative bg-surface-container-lowest p-space-md rounded-xl shadow-lg flex flex-col items-center w-full max-w-[280px]" style="border: 2px solid #FFB3AE;">
                            <div class="flex items-center justify-between w-full pb-2 mb-2 bg-surface-container-low px-3 py-1.5 rounded-lg">
                                <div class="flex items-center gap-1">
                                    <span class="font-headline-sm text-headline-sm text-primary">QRIS</span>
                                </div>
                                <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded font-bold">GPN</span>
                            </div>

                            <div class="relative p-2 bg-surface-container-lowest rounded-lg shadow-inner">
                                <svg class="w-48 h-48" fill="none" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="#FFFDF9" height="200" rx="8" width="200"></rect>
                                    <rect fill="#1C1C18" height="46" rx="4" width="46" x="15" y="15"></rect>
                                    <rect fill="#FFFDF9" height="30" rx="2" width="30" x="23" y="23"></rect>
                                    <rect fill="#865046" height="18" rx="2" width="18" x="29" y="29"></rect>
                                    <rect fill="#1C1C18" height="46" rx="4" width="46" x="139" y="15"></rect>
                                    <rect fill="#FFFDF9" height="30" rx="2" width="30" x="147" y="23"></rect>
                                    <rect fill="#865046" height="18" rx="2" width="18" x="153" y="29"></rect>
                                    <rect fill="#1C1C18" height="46" rx="4" width="46" x="15" y="139"></rect>
                                    <rect fill="#FFFDF9" height="30" rx="2" width="30" x="23" y="147"></rect>
                                    <rect fill="#865046" height="18" rx="2" width="18" x="29" y="153"></rect>
                                    <rect fill="#526442" height="10" width="10" x="75" y="20"></rect>
                                    <rect fill="#1C1C18" height="10" width="12" x="90" y="20"></rect>
                                    <rect fill="#865046" height="10" width="14" x="110" y="20"></rect>
                                    <rect fill="#1C1C18" height="10" width="20" x="75" y="35"></rect>
                                    <rect fill="#526442" height="15" width="10" x="105" y="35"></rect>
                                    <rect fill="#1C1C18" height="10" width="8" x="120" y="35"></rect>
                                    <rect fill="#1C1C18" height="12" width="12" x="20" y="75"></rect>
                                    <rect fill="#865046" height="12" width="10" x="38" y="75"></rect>
                                    <rect fill="#526442" height="8" width="20" x="55" y="75"></rect>
                                    <rect fill="#526442" height="12" width="16" x="20" y="95"></rect>
                                    <rect fill="#1C1C18" height="8" width="18" x="42" y="95"></rect>
                                    <rect fill="#1C1C18" height="10" width="24" x="20" y="115"></rect>
                                    <rect fill="#865046" height="14" width="12" x="50" y="115"></rect>
                                    <rect fill="#FDF9F2" height="40" rx="8" width="40" x="80" y="70"></rect>
                                    <circle cx="100" cy="90" fill="#E8A598" r="14"></circle>
                                    <path d="M100 84C98 84 96 86 96 88C96 92 100 95 100 95C100 95 104 92 104 88C104 86 102 84 100 84Z" fill="#351009"></path>
                                    <rect fill="#1C1C18" height="10" width="15" x="135" y="75"></rect>
                                    <rect fill="#526442" height="12" width="25" x="155" y="75"></rect>
                                    <rect fill="#865046" height="12" width="20" x="135" y="95"></rect>
                                    <rect fill="#1C1C18" height="8" width="18" x="160" y="95"></rect>
                                    <rect fill="#1C1C18" height="12" width="12" x="135" y="115"></rect>
                                    <rect fill="#526442" height="10" width="28" x="155" y="115"></rect>
                                    <rect fill="#526442" height="15" width="15" x="75" y="125"></rect>
                                    <rect fill="#1C1C18" height="8" width="25" x="95" y="125"></rect>
                                    <rect fill="#1C1C18" height="12" width="20" x="75" y="145"></rect>
                                    <rect fill="#865046" height="20" width="15" x="100" y="145"></rect>
                                    <rect fill="#526442" height="15" width="18" x="75" y="165"></rect>
                                    <rect fill="#1C1C18" height="12" width="25" x="100" y="170"></rect>
                                    <rect fill="#1C1C18" height="12" width="18" x="135" y="140"></rect>
                                    <rect fill="#865046" height="14" width="22" x="160" y="140"></rect>
                                    <rect fill="#526442" height="12" width="30" x="135" y="160"></rect>
                                    <rect fill="#1C1C18" height="20" width="14" x="170" y="160"></rect>
                                </svg>
                            </div>

                            <div class="mt-2 text-center">
                                <span class="font-label-sm text-label-sm text-on-surface-variant">NMID: ID1024883920192</span>
                                <p class="font-headline-sm text-headline-sm text-on-surface">Reloved</p>
                            </div>
                        </div>

                        <div class="w-full mt-space-md bg-surface-container-low rounded-xl p-space-sm">
                            <div class="flex justify-between items-center text-body-sm font-body-sm text-on-surface-variant">
                                <span>Subtotal Keranjang</span>
                                <span>Rp 219.000</span>
                            </div>
                            <div class="flex justify-between items-center text-body-sm font-body-sm text-on-surface-variant mt-1">
                                <span class="flex items-center gap-1">
                                    Kode Unik Verifikasi
                                    <span class="material-symbols-outlined text-[14px] text-secondary">info</span>
                                </span>
                                <span class="text-secondary font-semibold">+Rp 147</span>
                            </div>
                            <div class="mt-space-xs pt-space-xs flex justify-between items-center">
                                <span class="font-headline-sm text-headline-sm text-on-surface">Total Harus Dibayar</span>
                                <span class="font-headline-lg-mobile text-headline-lg-mobile text-primary font-bold" id="total-nominal" style="color: #FF49C1 !important;">Rp 219.147</span>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 text-center bg-tertiary-fixed/30 py-1 rounded">
                                Harap transfer tepat hingga 3 digit terakhir agar terverifikasi otomatis.
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-space-xs w-full mt-space-sm">
                            <button class="py-2.5 px-space-xs rounded-full font-label-md text-label-md flex items-center justify-center gap-1 transition-colors text-white shadow-sm" id="copy-btn" onclick="copyNominal()" style="background-color: #6A1452;" type="button">
                                <span class="material-symbols-outlined text-[16px] text-white">content_copy</span>
                                <span id="copy-text">Salin Nominal</span>
                            </button>
                            <button class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface py-2.5 px-space-xs rounded-full font-label-md text-label-md flex items-center justify-center gap-1 transition-colors" onclick="downloadQr()" type="button">
                                <span class="material-symbols-outlined text-[16px] text-secondary">download</span>
                                <span>Unduh QRIS</span>
                            </button>
                        </div>

                        <div class="mt-space-sm w-full bg-secondary-container/30 p-space-sm rounded-lg flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary text-[20px] flex-shrink-0">account_balance_wallet</span>
                            <p class="font-body-sm text-body-sm text-on-secondary-container">
                                Bisa dibayar pakai <strong class="font-semibold">GoPay, OVO, ShopeePay, DANA, BCA, Mandiri,</strong> atau m-Banking apapun.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Panduan -->
            <section class="px-margin mt-space-md">
                <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm" style="border: 1.5px solid #FFB3AE;">
                    <h3 class="font-headline-sm text-headline-sm flex items-center gap-space-xs mb-space-sm" style="color: #44113E;">
                        <span class="material-symbols-outlined text-[20px]" style="color: #6A1452;">help_center</span>Panduan Singkat Bayar
                    </h3>
                    <div class="grid grid-cols-1 gap-2.5">
                        <div class="flex items-start gap-space-xs">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center font-label-sm text-label-sm flex-shrink-0 text-white font-bold" style="background-color: #6A1452;">1</div>
                            <p class="font-body-md text-body-md" style="color: #44113E;">Buka aplikasi e-wallet (GoPay/ShopeePay/OVO) atau m-Banking pilihanmu.</p>
                        </div>
                        <div class="flex items-start gap-space-xs">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center font-label-sm text-label-sm flex-shrink-0 text-white font-bold" style="background-color: #6A1452;">2</div>
                            <p class="font-body-md text-body-md" style="color: #44113E;">Pilih menu <strong class="font-semibold">Scan QRIS</strong> lalu arahkan kamera ke barcode di atas (atau unggah tangkapan layar).</p>
                        </div>
                        <div class="flex items-start gap-space-xs">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center font-label-sm text-label-sm flex-shrink-0 text-white font-bold" style="background-color: #6A1452;">3</div>
                            <p class="font-body-md text-body-md" style="color: #44113E;">Periksa kembali penerima (<span class="font-medium" style="color: #6A1452;">Reloved</span>) dan nominal <strong class="font-semibold" style="color: #FF49C1;">Rp 219.147</strong>.</p>
                        </div>
                        <div class="flex items-start gap-space-xs">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center font-label-sm text-label-sm flex-shrink-0 text-white font-bold" style="background-color: #6A1452;">4</div>
                            <p class="font-body-md text-body-md" style="color: #44113E;">Masukkan PIN dan konfirmasi pembayaran. Selesai!</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tombol Konfirmasi -->
            <section class="px-margin mt-space-md mb-space-lg">
                <button class="relative overflow-hidden w-full active:scale-[0.98] transition-all text-white py-3.5 px-space-md rounded-full shadow-lg flex items-center justify-center gap-space-xs group" id="confirm-payment-btn" onclick="handlePaymentConfirm(event)" style="background-color: #FF49C1;" type="button">
                    <span class="material-symbols-outlined text-[22px] group-hover:rotate-12 transition-transform text-white">verified</span>
                    <span class="font-label-lg text-label-lg font-bold text-white">Saya Sudah Membayar (Verifikasi Otomatis)</span>
                </button>
                <div class="hidden mt-space-xs bg-secondary-container text-on-secondary-container p-2.5 rounded-lg text-center font-body-sm text-body-sm shadow" id="toast-feedback">
                    Memeriksa mutasi QRIS... Mohon tunggu sebentar, pesananmu sedang diverifikasi!
                </div>
            </section>
        </div>

        <script>
            let timeLeft = 14 * 60 + 59;
            const timerElement = document.getElementById('countdown');

            const countdownInterval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    if (timerElement) timerElement.textContent = "00:00 (Kadaluarsa)";
                    return;
                }
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                if (timerElement) {
                    timerElement.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                }
                timeLeft--;
            }, 1000);

            function copyNominal() {
                navigator.clipboard?.writeText("219147").catch(() => {});
                const copyText = document.getElementById('copy-text');
                if (copyText) {
                    copyText.textContent = "Berhasil Disalin!";
                    setTimeout(() => {
                        copyText.textContent = "Salin Nominal";
                    }, 2000);
                }
            }

            function downloadQr() {
                alert("Kode QRIS Reloved berhasil disimpan ke galeri ponsel Anda.");
            }

            function handlePaymentConfirm(e) {
                const btn = document.getElementById('confirm-payment-btn');
                const toast = document.getElementById('toast-feedback');

                const circle = document.createElement('span');
                const diameter = Math.max(btn.clientWidth, btn.clientHeight);
                const radius = diameter / 2;
                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${e.clientX - btn.getBoundingClientRect().left - radius}px`;
                circle.style.top = `${e.clientY - btn.getBoundingClientRect().top - radius}px`;
                circle.classList.add('absolute', 'rounded-full', 'bg-white/40', 'pointer-events-none', 'animate-ping');
                btn.appendChild(circle);
                setTimeout(() => circle.remove(), 600);

                if (toast) {
                    toast.classList.remove('hidden');
                    setTimeout(() => {
                        toast.textContent = "✨ Pembayaran Terkonfirmasi! Menyiapkan paket thrift cantikmu...";
                    }, 2500);
                }
            }
        </script>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport">
    <meta content="mobile_stack" name="shell-type">
    <title>Lupa Kata Sandi - Reloved</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
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
                min-height: max(884px, 100dvh);
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
<body class="bg-surface font-body-md text-on-surface flex flex-col min-h-screen" style="background-color: rgb(255, 250, 240); color: rgb(68, 17, 62);">
    <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.03)]">
        <div class="h-14 px-margin flex items-center justify-between gap-space-sm">
            <div class="flex items-center gap-space-xs min-w-0">
                <a aria-label="Go Back" class="w-11 h-11 -ml-2 rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors" href="{{ route('login') }}" style="color: rgb(68, 17, 62);">
                    <span class="material-symbols-outlined text-[22px]">arrow_back</span>
                </a>
                <img alt="Bloom Thrift Logo" class="h-7 w-auto object-contain flex-shrink-0 hidden sm:block" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDD2v3MjBi9qUOVEbqfpuflQWMVa3o349ntZOEiClg8FDB37lWAFtdZnyGo8t-1OQOscqZhxpg6g6fHBJTr_Ns49zpOZAebmx8_P7AQGhpy_IuS7FEZOjcWObSMGl524iaGJ5-ssswdvx7_JKseAX-MFGv1TmBa0wC9KmzTGTl1MzGmynlRNrMk0PmN0BaseKGsOfrCPvb5GMq5OE_cEWalzbJ4jKqYeGULAM_fz8Ks">
                <h1 class="font-headline-sm text-headline-sm text-on-surface truncate" style="color: rgb(68, 17, 62);">Masuk / Daftar</h1>
            </div>
            <div class="flex items-center gap-space-xs flex-shrink-0">
                <a aria-label="Kembali ke Beranda" class="w-11 h-11 rounded-full flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors" href="{{ url('/') }}">
                    <span class="material-symbols-outlined text-[20px]">home</span>
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex flex-col relative w-full pt-14 pb-safe bg-surface">
        <div class="flex flex-col w-full px-margin pb-space-xl">
            <!-- Interactive Visual Card / Illustration Header -->
            <div class="relative w-full rounded-xl overflow-hidden bg-surface-container-low shadow-sm mt-space-sm mb-space-lg p-space-md flex items-center gap-space-md">
                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-primary-fixed/40">
                    <img class="w-full h-full object-cover" alt="Reloved Vintage" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBBduRLCH1co9mHUjaXpHLWf8_GMlIvlijVFyE5dRVvDQYHz0ty6jvp_mPY0ptB2d-ojlpo-ewAqvsJaJ43lws4hZyGUE0OugL8qn9x-NC94OoTC12YfQxwMm8-RG2AG-qrt7jhVei4RkPELY5muWRYtntAxLtcZvvI8TXp5_iW12sJQbSghISiyVoMvGWVbLmMSeQuodfQ1VdFpyEvYySayEf8Jf_McdOBV1q4a00">
                </div>
                <div class="min-w-0 flex-1">
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm mb-1">
                        <span class="material-symbols-outlined text-[14px]">key</span>
                        <span>🔑 Bantuan Akun Reloved</span>
                    </div>
                    <h2 class="font-headline-sm text-headline-sm text-on-surface truncate">Lupa Kata Sandi? 🌸</h2>
                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">Pulihkan akses lemari vintage impianmu dengan mudah dan aman.</p>
                </div>
            </div>

            <!-- Intro Description & Instructions -->
            <div class="mb-space-lg">
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    Jangan khawatir! Masukkan email atau nomor WhatsApp terdaftar Anda untuk menerima tautan kode verifikasi reset sandi.
                </p>
            </div>

            <!-- Pesan Sukses / Error dari Laravel -->
            @if (session('status'))
                <div class="flex items-center gap-space-sm p-space-md mb-space-lg bg-secondary-container rounded-xl text-on-secondary-container shadow-sm">
                    <span class="material-symbols-outlined text-secondary text-[22px]">check_circle</span>
                    <p class="font-body-sm text-body-sm font-semibold">{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="p-space-md mb-space-lg bg-error-container rounded-xl text-on-error-container shadow-sm">
                    <ul class="list-disc pl-5 font-body-sm text-body-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- STEP 1: Request Verification Code Section -->
            <section class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-space-lg">
                <div class="flex items-center justify-between mb-space-md">
                    <div class="flex items-center gap-space-xs">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-primary-container text-on-primary-container font-label-sm text-label-sm" style="background-color: rgb(106, 20, 82); color: rgb(255, 255, 255);">1</span>
                        <span class="font-label-lg text-label-lg text-on-surface">Kirim Kode Reset</span>
                    </div>
                    <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-secondary-container/60 text-secondary" style="background-color: rgb(255, 179, 174); color: rgb(68, 17, 62); font-weight: 700;">Langkah 1/2</span>
                </div>

                <form action="{{ route('password.otp.send') }}" method="POST" class="flex flex-col gap-space-md" id="requestResetForm">
                    @csrf
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md text-label-md text-on-surface flex items-center justify-between" for="contactInput">
                            <span>Email atau No. WhatsApp Terdaftar</span>
                            <span class="font-body-sm text-body-sm text-primary">*</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3.5 text-on-surface-variant text-[20px] pointer-events-none">mail_lock</span>
                            <input class="w-full h-12 pl-11 pr-4 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-on-surface-variant/50 focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#e8a598] transition-all" id="contactInput" name="identifier" value="{{ old('identifier', session('reset_identifier')) }}" placeholder="contoh: thriftlover@reloved.id / 0812xxxx" required type="text" style="border: 1.5px solid rgb(255, 179, 174); background-color: rgb(255, 255, 255); color: rgb(68, 17, 62);">
                        </div>
                    </div>

                    <button class="w-full h-12 mt-1 rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-sm active:scale-[0.98] transition-transform flex items-center justify-center gap-space-xs cursor-pointer hover:opacity-95" id="btnSendCode" type="submit" style="background-color: rgb(106, 20, 82); color: rgb(255, 255, 255); font-weight: 700;">
                        <span class="material-symbols-outlined text-[20px]">send</span>
                        <span>Kirim Kode Verifikasi / Link Reset</span>
                    </button>
                </form>
            </section>

            <!-- Flow Connector / Divider -->
            <div class="relative flex items-center justify-center my-space-xs">
                <div class="w-full h-px bg-surface-variant"></div>
                <div class="absolute px-3 bg-surface font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1 rounded-full">
                    <span class="material-symbols-outlined text-primary text-[16px]">lock_reset</span>
                    <span>Langkah Selanjutnya</span>
                </div>
            </div>

            <!-- STEP 2: Input OTP & New Password -->
            <section class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mt-space-md mb-space-lg">
                <div class="flex items-center justify-between mb-space-md">
                    <div class="flex items-center gap-space-xs">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm" style="background-color: rgb(255, 73, 193); color: rgb(255, 255, 255);">2</span>
                        <span class="font-label-lg text-label-lg text-on-surface">Buat Kata Sandi Baru</span>
                    </div>
                    <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant" style="background-color: rgb(255, 179, 174); color: rgb(68, 17, 62); font-weight: 700;">Langkah 2/2</span>
                </div>

                <form action="{{ route('password.otp.update') }}" method="POST" class="flex flex-col gap-space-md" id="newPasswordForm">
                    @csrf
                    <!-- Simpan identifier tersembunyi agar terhubung dengan langkah 1 -->
                    <input type="hidden" name="identifier" id="hiddenIdentifier" value="{{ old('identifier', session('reset_identifier')) }}">

                    <!-- 6-digit OTP Box Inputs -->
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <label class="font-label-md text-label-md text-on-surface">Kode OTP / Verifikasi 6 Digit</label>
                            <button class="font-label-sm text-label-sm text-primary hover:underline cursor-pointer" onclick="document.getElementById('requestResetForm').submit();" type="button">Kirim Ulang</button>
                        </div>
                        <div class="grid grid-cols-6 gap-2 w-full max-w-sm mx-auto my-1">
                            @for ($i = 0; $i < 6; $i++)
                                <input class="otp-box w-full h-12 text-center font-headline-sm text-headline-sm rounded-lg focus:outline-none transition-all" inputmode="numeric" maxlength="1" name="otp[]" oninput="moveNext(this, {{ $i }})" onkeydown="movePrev(event, this, {{ $i }})" placeholder="•" required style="border: 1.5px solid rgb(255, 179, 174); background-color: rgb(255, 255, 255); color: rgb(68, 17, 62);" type="text">
                            @endfor
                        </div>
                    </div>

                    <!-- Kata Sandi Baru -->
                    <div class="flex flex-col gap-1.5 mt-1">
                        <label class="font-label-md text-label-md text-on-surface" for="newPassword">Kata Sandi Baru</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3.5 text-on-surface-variant text-[20px] pointer-events-none">lock</span>
                            <input class="w-full h-12 pl-11 pr-11 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-on-surface-variant/50 focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#e8a598] transition-all" id="newPassword" name="password" placeholder="Minimal 8 karakter" required type="password" style="border: 1.5px solid rgb(255, 179, 174); background-color: rgb(255, 255, 255); color: rgb(68, 17, 62);">
                            <button aria-label="Tampilkan sandi" class="absolute right-3 text-on-surface-variant hover:text-on-surface p-1 flex items-center justify-center cursor-pointer" onclick="togglePasswordVisibility('newPassword', 'toggleIcon1')" type="button">
                                <span class="material-symbols-outlined text-[20px]" id="toggleIcon1">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Konfirmasi Kata Sandi Baru -->
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-md text-label-md text-on-surface" for="confirmPassword">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-3.5 text-on-surface-variant text-[20px] pointer-events-none">lock_clock</span>
                            <input class="w-full h-12 pl-11 pr-11 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md placeholder:text-on-surface-variant/50 focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#e8a598] transition-all" id="confirmPassword" name="password_confirmation" placeholder="Ulangi kata sandi baru" required type="password" style="border: 1.5px solid rgb(255, 179, 174); background-color: rgb(255, 255, 255); color: rgb(68, 17, 62);">
                            <button aria-label="Tampilkan konfirmasi sandi" class="absolute right-3 text-on-surface-variant hover:text-on-surface p-1 flex items-center justify-center cursor-pointer" onclick="togglePasswordVisibility('confirmPassword', 'toggleIcon2')" type="button">
                                <span class="material-symbols-outlined text-[20px]" id="toggleIcon2">visibility</span>
                            </button>
                        </div>
                    </div>

                   <!-- Visual Password Match Indicator / Gauge Micro -->
                <div class="flex items-center gap-1.5 px-1">
                    <div id="strength-bar-1" class="h-1 flex-1 rounded-full bg-surface-variant transition-colors duration-300"></div>
                    <div id="strength-bar-2" class="h-1 flex-1 rounded-full bg-surface-variant transition-colors duration-300"></div>
                    <div id="strength-bar-3" class="h-1 flex-1 rounded-full bg-surface-variant transition-colors duration-300"></div>
                    <div id="strength-bar-4" class="h-1 flex-1 rounded-full bg-surface-variant transition-colors duration-300"></div>
                    <span id="strength-text" class="font-label-sm text-label-sm ml-1 text-on-surface-variant">Belum diisi</span>
                </div>

                    <!-- Submit Reset Button -->
                    <button class="w-full h-12 mt-2 rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-sm active:scale-[0.98] transition-transform flex items-center justify-center gap-space-xs cursor-pointer hover:opacity-95" type="submit" style="background-color: rgb(255, 73, 193); color: rgb(255, 255, 255); font-weight: 700; box-shadow: rgba(255, 73, 193, 0.35) 0px 4px 16px;">
                        <span class="material-symbols-outlined text-[20px]">arrow_back_ios_new</span>
                        <span>Simpan Kata Sandi Baru ✨</span>
                    </button>
                </form>
            </section>

            <!-- Cute Warm Security Tips Card -->
            <div class="w-full bg-tertiary-fixed/40 rounded-xl p-space-md mb-space-lg flex items-start gap-space-sm shadow-sm" style="background-color: rgb(255, 247, 173); border: 1.5px solid rgb(255, 179, 174); color: rgb(68, 17, 62);">
                <div class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="material-symbols-outlined text-[18px]">verified_user</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-label-lg text-label-lg text-on-tertiary-fixed mb-0.5">Tips Keamanan Reloved 🌸</h3>
                    <p class="font-body-sm text-body-sm text-on-tertiary-fixed-variant leading-relaxed">
                        Gunakan kombinasi minimal 8 karakter dengan huruf kapital dan angka agar akun thrifting-mu tetap aman terlindungi saat berburu item vintage langka!
                    </p>
                </div>
            </div>

            <!-- Secondary Actions & Support -->
            <div class="flex flex-col items-center gap-space-md text-center pt-space-xs">
                <!-- Helpdesk Link -->
                <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md hover:bg-secondary-fixed transition-colors" href="https://wa.me/6281234567890?text=Halo%20Admin%20Reloved,%20saya%20butuh%20bantuan%20reset%20kata%20sandi" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-[18px]">chat</span>
                    <span>Masih butuh bantuan? Hubungi CS Reloved via WhatsApp</span>
                </a>
                <!-- Return to Login Button -->
                <a class="w-full max-w-xs h-11 rounded-full bg-surface-container-high text-on-surface font-label-lg text-label-lg flex items-center justify-center gap-2 hover:bg-surface-variant transition-colors" href="{{ route('login') }}">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span>Kembali ke Halaman Masuk</span>
                </a>
            </div>

            <!-- Vintage Aesthetic Trust Badge Footer -->
            <div class="mt-space-xl text-center flex flex-col items-center justify-center gap-1 opacity-70">
                <div class="flex items-center gap-1 text-primary">
                    <span class="material-symbols-outlined text-[16px]">favorite</span>
                    <span class="font-label-sm text-label-sm">Curated with love by Reloved Fashion Boutique</span>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Sistem verifikasi otomatis berstandar enkripsi 256-bit.</p>
            </div>
        </div>

        <script>
            function togglePasswordVisibility(inputId, iconId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);
                if (!input || !icon) return;
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.textContent = 'visibility_off';
                } else {
                    input.type = 'password';
                    icon.textContent = 'visibility';
                }
            }

            function moveNext(input, index) {
                if (input.value.length >= 1) {
                    const otpInputs = document.querySelectorAll('.otp-box');
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
            }

            function movePrev(event, input, index) {
                if (event.key === 'Backspace' && input.value === '') {
                    const otpInputs = document.querySelectorAll('.otp-box');
                    if (index > 0) {
                        otpInputs[index - 1].focus();
                    }
                }
            }

            // Sinkronkan input email/WA dari Langkah 1 ke hidden input di Langkah 2 secara otomatis
            const contactInput = document.getElementById('contactInput');
            const hiddenIdentifier = document.getElementById('hiddenIdentifier');
            if (contactInput && hiddenIdentifier) {
                contactInput.addEventListener('input', function () {
                    hiddenIdentifier.value = this.value;
                });
            }
            // Cek Kekuatan Kata Sandi secara Real-Time
const newPasswordInput = document.getElementById('newPassword');
if (newPasswordInput) {
    newPasswordInput.addEventListener('input', function () {
        const val = this.value;
        let score = 0;

        if (val.length > 0) {
            if (val.length >= 8) score++; // Minimal 8 karakter
            if (/[A-Z]/.test(val)) score++; // Ada huruf kapital
            if (/[0-9]/.test(val)) score++; // Ada angka
            if (/[^A-Za-z0-9]/.test(val) || val.length >= 12) score++; // Ada simbol atau sangat panjang
            if (score === 0) score = 1; // Minimal 1 bar kalau sudah mulai ngetik
        }

        const bars = [
            document.getElementById('strength-bar-1'),
            document.getElementById('strength-bar-2'),
            document.getElementById('strength-bar-3'),
            document.getElementById('strength-bar-4')
        ];
        const text = document.getElementById('strength-text');

        // Reset semua bar ke warna abu-abu default
        bars.forEach(bar => {
            bar.style.backgroundColor = '';
            bar.classList.add('bg-surface-variant');
        });

        if (score === 0) {
            text.textContent = 'Belum diisi';
            text.style.color = '#847370';
        } else if (score === 1) {
            bars[0].classList.remove('bg-surface-variant');
            bars[0].style.backgroundColor = '#ba1a1a'; // Merah (Lemah)
            text.textContent = 'Kekuatan: Lemah';
            text.style.color = '#ba1a1a';
        } else if (score === 2) {
            bars[0].classList.remove('bg-surface-variant');
            bars[1].classList.remove('bg-surface-variant');
            bars[0].style.backgroundColor = '#e88d67'; // Oranye/Peach (Sedang)
            bars[1].style.backgroundColor = '#e88d67';
            text.textContent = 'Kekuatan: Sedang';
            text.style.color = '#b55d35';
        } else if (score === 3) {
            bars[0].classList.remove('bg-surface-variant');
            bars[1].classList.remove('bg-surface-variant');
            bars[2].classList.remove('bg-surface-variant');
            bars[0].style.backgroundColor = 'rgb(106, 20, 82)'; // Ungu khas desainmu
            bars[1].style.backgroundColor = 'rgb(106, 20, 82)';
            bars[2].style.backgroundColor = 'rgb(255, 73, 193)'; // Pink khas desainmu
            text.textContent = 'Kekuatan: Baik';
            text.style.color = 'rgb(106, 20, 82)';
        } else if (score === 4) {
            bars.forEach(bar => {
                bar.classList.remove('bg-surface-variant');
                bar.style.backgroundColor = '#2e7d32'; // Hijau (Sangat Kuat)
            });
            text.textContent = 'Kekuatan: Sangat Kuat ✨';
            text.style.color = '#2e7d32';
        }
    });
}
        </script>
        
    </main>
</body>
</html>
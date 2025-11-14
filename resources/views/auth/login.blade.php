<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Siswa | Bimbel</title>
    @vite(['resources/css/auth.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen overflow-hidden bg-gradient-to-r from-orange-50 to-red-50">
    <div class="grid h-full w-full grid-cols-2">
        <!-- Left Section -->
        <div class="flex flex-col justify-center px-16 text-gray-900 bg-gradient-to-r from-orange-50 to-red-50">
            <div class="w-[600px]">
                <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo"
                    class="w-[295px] mb-5 brightness-0 invert-0" />
                <h1 class="text-3xl md:text-4xl font-bold text-red-500 leading-tight mb-4">
                    Selamat Datang di Bimbel <br> <span class="text-orange-600">Sinar Education! </span>
                </h1>
                <p class="text-lg mb-4 text-gray-800">
                    Ayo mulai perjalanan belajarmu bersama kami!
                    Masuk untuk mengakses kelas dan absensi belajar 📚
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('register') }}"
                        class="px-5 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold shadow  hover:-translate-y-1 transition-transform">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div
            class="flex items-center w-[600px] justify-center bg-white rounded-tl-[44px] rounded-bl-[44px] shadow-lg ml-auto">
            <div class="w-[400px] ml-5">
                <h2 class="text-4xl font-bold mb-8 text-start">
                    Hai, Selamat Datang <br> Kembali!
                </h2>
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 font-semibold">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="input-field" placeholder=" "
                            required />
                        <label for="email" class="input-label">Email</label>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="input-field" placeholder=" "
                            required />
                        <label for="password" class="input-label">Password</label>
                    </div>

                    <div class="flex items-center justify-between mb-6 text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" class="text-crimson" checked /> Ingat saya
                        </label>
                        <a href="{{ route('password.request') }}" class="text-crimson hover:underline transition">Lupa
                            Password?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-3 rounded-full bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold hover:-translate-y-1 transition-transform">
                        Masuk
                    </button>

                    <p class="mt-6 text-center text-sm text-gray-500">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-crimson hover:underline transition">Daftar
                            Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Siswa | Bimbel</title>
    @vite(['resources/css/auth.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen overflow-auto bg-gradient-to-r from-orange-50 to-red-50">
    <div class="flex flex-col md:flex-row h-full w-full">
        <!-- Left Section -->
        <div class="flex flex-col justify-center px-8 md:px-16 text-gray-900 bg-gradient-to-r from-orange-50 to-red-50 md:w-1/2">
            <div class="md:w-[600px] w-full text-center md:text-left">
                <img src="{{ asset('img/logo-panjang.png') }}" alt="Logo"
                    class="mx-auto md:mx-0 w-60 mb-5 brightness-0 invert-0" />
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-500 leading-tight mb-4">
                    Selamat Datang di Bimbel <br> <span class="text-orange-600">Sinar Education! </span>
                </h1>
                <p class="text-base sm:text-lg mb-4 text-gray-800">
                    Ayo mulai perjalanan belajarmu bersama kami!
                    Masuk untuk mengakses kelas dan absensi belajar 📚
                </p>
                <div class="flex justify-center md:justify-start gap-4">
                    <a href="{{ route('register') }}"
                        class="px-5 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold shadow hover:-translate-y-1 transition-transform">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div
            class="flex items-center justify-center bg-white md:rounded-tl-[44px] md:rounded-bl-[44px] shadow-lg md:w-1/2 w-full mt-8 md:mt-0">
            <div class="w-full max-w-md px-6 py-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-8 text-center md:text-start">
                    Hai, Selamat Datang <br> Kembali!
                </h2>

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 font-semibold text-center md:text-left">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group mb-4">
                        <input type="email" id="email" name="email" class="input-field" placeholder=" " required />
                        <label for="email" class="input-label">Email</label>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group mb-4">
                        <input type="password" id="password" name="password" class="input-field" placeholder=" "
                            required />
                        <label for="password" class="input-label">Password</label>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between mb-6 text-sm gap-2">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" class="text-crimson" checked /> Ingat saya
                        </label>
                        <a href="{{ route('forgot-password') }}" class="text-crimson hover:underline transition">Lupa
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

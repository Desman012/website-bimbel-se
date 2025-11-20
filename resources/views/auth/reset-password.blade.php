<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password | Bimbel Sinar Education</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen bg-gradient-to-r from-orange-50 to-red-50 flex items-center justify-center">

    <div
        class="bg-white rounded-tl-[44px] rounded-bl-[44px] shadow-lg w-full max-w-md p-8 sm:p-12 flex flex-col items-center">

        <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo"
            class="w-[200px] mb-6 brightness-0 invert-0" />

        <h2 class="text-3xl font-bold text-red-500 mb-4 text-center">Atur Ulang Password</h2>
        <p class="text-gray-700 text-center mb-6">
            Masukkan password baru Anda dan konfirmasi untuk mengatur ulang.
        </p>

        @if (session('status'))
            <div class="mb-4 w-full p-3 text-green-700 bg-green-100 rounded-md text-center">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 w-full p-3 text-red-700 bg-red-100 rounded-md text-center text-sm">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="w-full">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="relative z-0 w-full mb-4">
                <input type="email" name="email" id="email" value="{{ $email }}" required
                    class="peer block w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                <label for="email"
                    class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-sm peer-focus:text-orange-500">
                    Email Anda
                </label>
            </div>

            <div class="relative z-0 w-full mb-4">
                <input type="password" name="password" id="password" placeholder=" " required
                    class="peer block w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                <label for="password"
                    class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-sm peer-focus:text-orange-500">
                    Password Baru
                </label>
            </div>

            <div class="relative z-0 w-full mb-4">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" "
                    required
                    class="peer block w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                <label for="password_confirmation"
                    class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-sm peer-focus:text-orange-500">
                    Konfirmasi Password
                </label>
            </div>

            <button type="submit"
                class="w-full py-2.5 bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold rounded-full hover:-translate-y-1 transition-transform text-sm">
                Reset Password
            </button>
        </form>

        <a href="{{ route('login') }}"
            class="mt-6 text-crimson hover:underline transition text-sm">Kembali ke halaman login</a>
    </div>

</body>

</html>

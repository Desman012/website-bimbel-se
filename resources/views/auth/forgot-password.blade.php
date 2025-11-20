<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password | Bimbel Sinar Education</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen bg-gradient-to-r from-orange-50 to-red-50 flex items-center justify-center">

    <div
        class="bg-white rounded-tl-[44px] rounded-bl-[44px] shadow-lg w-full max-w-md p-8 sm:p-12 flex flex-col items-center">

        <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo"
            class="w-[200px] mb-6 brightness-0 invert-0" />

        <h2 class="text-3xl font-bold text-red-500 mb-4 text-center">Lupa Password</h2>
        <p class="text-gray-700 text-center mb-6">
            Masukkan email Anda, dan kami akan mengirimkan link untuk mereset password.
        </p>

        @if (session('status'))
            <div class="mb-4 w-full p-3 text-green-700 bg-green-100 rounded-md text-center">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->has('email'))
            <div class="mb-4 w-full p-3 text-red-700 bg-red-100 rounded-md text-center">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('forgot-password') }}" class="w-full">
            @csrf

            <!-- Email -->
            <div class="mb-4 w-full">
                <label for="email" class="block mb-1 text-gray-700 font-medium text-sm">Email Anda</label>
                <input type="email" name="email" id="email" placeholder="Email Anda" required
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
            </div>

            <button type="submit"
                class="w-full py-2.5 bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold rounded-full hover:-translate-y-1 transition-transform text-sm">
                Kirim Link Reset
            </button>
        </form>

        <a href="{{ route('login') }}"
            class="mt-6 text-crimson hover:underline transition text-sm">Kembali ke halaman login</a>
    </div>

</body>

</html>

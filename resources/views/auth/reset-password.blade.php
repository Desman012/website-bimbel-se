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
        class="bg-white rounded-[44px] shadow-lg w-full max-w-md p-8 sm:p-12 flex flex-col items-center">

        <img src="{{ asset('img/logo-panjang.png') }}" alt="Logo"
            class="w-[200px] mb-6 brightness-0 invert-0" />

        <h2 class="text-3xl font-bold text-red-500 mb-4 text-center">Atur Ulang Password</h2>
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
                        <input type="hidden" name="guard" value="{{ $guard }}">


            <!-- Email -->
            <div class="mb-4 w-full">
                <label for="email" class="block mb-1 text-gray-700 font-medium text-sm">Email Anda</label>
                <input type="email" readonly name="email" id="email" value="{{ $email }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Password Baru -->
            <div class="mb-4 w-full">
                <label for="password" class="block mb-1 text-gray-700 font-medium text-sm">Password Baru</label>
                <input type="password" name="password" id="password" placeholder="Password Baru" required
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4 w-full">
                <label for="password_confirmation" class="block mb-1 text-gray-700 font-medium text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password"
                    required class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
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

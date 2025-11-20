<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">

    <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Lupa Password</h2>

        {{-- Pesan sukses --}}
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('status') }}
            </div>
        @endif

        {{-- Pesan error global --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('forgot-password') }}">
            @csrf

            {{-- Input email --}}
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email Anda"
                    required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                >
                @error('email')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                Kirim Link Reset Password
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Masukkan email yang terdaftar di sistem. Jika email valid, Anda akan menerima link reset password.
        </p>
    </div>

</body>
</html>

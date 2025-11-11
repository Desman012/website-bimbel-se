<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold text-center text-crimson mb-4">Atur Ulang Password</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $request->email) }}" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-crimson focus:border-crimson">
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="password" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-crimson focus:border-crimson">
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-crimson focus:border-crimson">
            </div>

            <button type="submit"
                class="mt-5 w-full bg-crimson text-white font-semibold py-2 rounded-lg hover:bg-red-600 transition">
                Simpan Password Baru
            </button>
        </form>
    </div>
</body>
</html>

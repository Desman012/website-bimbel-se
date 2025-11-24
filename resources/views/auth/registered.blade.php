<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen bg-gradient-to-r from-orange-50 to-red-50 flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-8 flex flex-col items-center">
        <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo" class="w-[200px] mb-6" />
        <h2 class="text-3xl font-bold text-red-500 mb-4 text-center">Pendaftaran Berhasil!</h2>
        <p class="text-gray-700 text-center mb-6">
            Proses pendaftaran akun Anda sedang diproses oleh Admin.<br>
            Silakan cek email secara berkala untuk status akun.
        </p>
        <a href="{{ route('landing') }}" 
           class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">
            Kembali ke Halaman Home
        </a>
    </div>

</body>
</html>

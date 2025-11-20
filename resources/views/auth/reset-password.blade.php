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
        <form method="POST" action="{{ url('/reset-password-submit') }}">
    @csrf
    <input type="hidden" name="token" value="{{ request()->token }}">
    <input type="hidden" name="email" value="{{ request()->email }}">
    <input type="hidden" name="guard" value="{{ request()->guard }}">
    <input type="password" name="password" placeholder="Password Baru" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <button type="submit">Reset Password</button>
</form>
@if(session('status')) <p>{{ session('status') }}</p> @endif
@error('email') <p>{{ $message }}</p> @enderror
@error('password') <p>{{ $message }}</p> @enderror
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="max-w-md mx-auto mt-20">
        <h2 class="text-2xl font-bold mb-4">Lupa Password</h2>
        <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Email Anda" required>
    <button type="submit">Kirim Link Reset</button>
    @if(session('status')) <p>{{ session('status') }}</p> @endif
    @error('email') <p>{{ $message }}</p> @enderror
</form>


        @if (session('status'))
            <div class="text-green-600">{{ session('status') }}</div>
        @endif

        @if ($errors->has('email'))
            <div class="text-red-600">{{ $errors->first('email') }}</div>
        @endif
    </div>
</body>

</html>

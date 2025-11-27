<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Add Time</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    @include('admins.layouts.navbar')

    {{-- Sidebar --}}
    @include('admins.layouts.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2 mt-1">
                    <div class="col-sm-6 pl-4 flex items-center">
                        <a href="{{ route('admin.times.index') }}"
                           class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Tambah Time Baru</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.times.index') }}">Time</a></li>
                            <li class="breadcrumb-item active">Tambah Time</li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('admin.times.store') }}">
                        @csrf

                        {{-- NAMA TIME --}}
                        <div class="mb-6">
                            <label for="name_time" class="block text-gray-700 font-semibold mb-2">
                                Nama Time
                            </label>

                            <input type="text"
                                id="name_time"
                                name="name_time"
                                placeholder="Contoh: Pagi (08:00-10:00)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                value="{{ old('name_time') }}"
                                required>
                        </div>

                        {{-- JAM MASUK --}}
                        <div class="mb-6">
                            <label for="times_in" class="block text-gray-700 font-semibold mb-2">
                                Jam Masuk (Opsional)
                            </label>

                            <input type="time"
                                id="times_in"
                                name="times_in"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                value="{{ old('times_in') }}">
                        </div>

                        {{-- JAM KELUAR --}}
                        <div class="mb-6">
                            <label for="times_out" class="block text-gray-700 font-semibold mb-2">
                                Jam Keluar (Opsional)
                            </label>

                            <input type="time"
                                id="times_out"
                                name="times_out"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                value="{{ old('times_out') }}">
                        </div>

                        {{-- SUBMIT BUTTON --}}
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-lg shadow-md transition">
                                Simpan Time
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </section>

    </div>
</div>

<!-- Scripts -->
<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>

</body>
</html>

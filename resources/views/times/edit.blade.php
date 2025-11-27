<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Edit Time</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- NAVBAR --}}
    @include('admins.layouts.navbar')

    {{-- SIDEBAR --}}
    @include('admins.layouts.sidebar')

    {{-- CONTENT WRAPPER --}}
    <div class="content-wrapper">

        {{-- HEADER --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-1">

                    <div class="col-sm-6 pl-4 flex items-center">
                        <a href="{{ route('admin.times.index') }}" 
                            class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Edit Time</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.times.index') }}">Time</a></li>
                            <li class="breadcrumb-item active">Edit Time</li>
                        </ol>
                    </div>

                </div>
            </div>
        </section>

        {{-- MAIN CONTENT --}}
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <form method="POST" action="{{ route('admin.times.update', $time->id) }}">
                        @csrf
                        @method('PUT')

                        <h2 class="text-xl font-semibold mb-6 text-gray-800">Edit Time</h2>

                        {{-- Nama Time --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Time</label>

                            <input 
                                type="text"
                                name="name_time"
                                value="{{ $time->name_time }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                required
                            >
                        </div>

                        {{-- Jam Masuk --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Jam Masuk (Opsional)</label>

                            <input 
                                type="time"
                                name="times_in"
                                value="{{ $time->times_in }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            >
                        </div>

                        {{-- Jam Keluar --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Jam Keluar (Opsional)</label>

                            <input 
                                type="time"
                                name="times_out"
                                value="{{ $time->times_out }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            >
                        </div>

                        <hr class="my-8 border-yellow-300">

                        {{-- ACTION BUTTONS --}}
                        <div class="flex justify-end mt-6">

                            <a href="{{ route('admin.times.index') }}"
                                class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold 
                                       rounded-lg shadow-md transition duration-150 mr-3">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>

                            <button type="submit"
                                class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold 
                                       rounded-lg shadow-md transition duration-150">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </section>

    </div>
    {{-- END CONTENT WRAPPER --}}

</div>

{{-- SCRIPTS --}}
<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>

</body>
</html>

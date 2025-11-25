<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Add Curriculum</title>

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
                        <a href="{{ route('admin.curriculums.index') }}"
                           class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Tambah Kurikulum Baru</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.curriculums.create') }}">Kurikulum</a></li>
                            <li class="breadcrumb-item active">Tambah Kurikulum</li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <form method="POST" action="/curriculums/store">
                        @csrf

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline"> Ada kesalahan pada input kamu.</span>
                            </div>
                        @endif

                        {{-- Input Nama Level --}}
                        <div class="mb-6">
                            <label for="name_curriculum" class="block text-gray-700 font-semibold mb-2">
                                Nama Kurikulum
                            </label>

                            <input type="text"
                                   id="name_curriculum"
                                   name="name_curriculum"
                                   placeholder="Masukkan nama kurikulum (contoh: SD, SMP, SMA)"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm
                                          @error('name_curriculum') border-red-500 @enderror"
                                   value="{{ old('name_curriculum') }}">

                            @error('name_curriculum')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                Simpan Kurikulum
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

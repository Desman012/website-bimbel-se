<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Edit Class</title>

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
                        <a href="{{ route('admin.classes.index') }}"
                           class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Edit Kelas</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}">Kelas</a></li>
                            <li class="breadcrumb-item active">Edit Kelas</li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <form method="POST" action="{{ route('admin.classes.edit', $class->id) }}">
                        @csrf

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline"> Ada kesalahan saat mengubah data.</span>
                            </div>
                        @endif

                        {{-- LEVEL --}}
                        <div class="mb-6">
                            <label for="level_id" class="block text-gray-700 font-semibold mb-2">
                                Pilih Level
                            </label>

                            <select id="level_id" name="level_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">

                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}"
                                        {{ $class->level_id == $level->id ? 'selected' : '' }}>
                                        {{ $level->name_level }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- NAMA KELAS --}}
                        <div class="mb-6">
                            <label for="name_class" class="block text-gray-700 font-semibold mb-2">
                                Nama Kelas
                            </label>

                            <input type="text"
                                   id="name_class"
                                   name="name_class"
                                   value="{{ $class->name_class }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                   required>
                        </div>

                        <hr class="my-8 border-yellow-300">

                        <!-- BUTTON -->
                        <div class="flex justify-end mt-4">

                            <a href="{{ route('admin.classes.index') }}"
                               class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                      font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>

                            <button type="submit"
                                class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                       font-semibold rounded-lg shadow-md transition duration-150">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </section>

    </div>
</div>

<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>

</body>
</html>

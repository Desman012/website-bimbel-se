<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Program</title>

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
                        <a href="{{ route('admin.programs.index') }}" class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Detail Program</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/programs">Program</a></li>
                            <li class="breadcrumb-item active">Detail Program</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        {{-- MAIN CONTENT --}}
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Informasi Program</h2>

                    {{-- Informasi Program --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1">ID Program</label>
                        <p class="text-gray-900 text-lg">{{ $program->id }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1">Nama Program</label>
                        <p class="text-gray-900 text-lg">{{ $program->name_program }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1">Dibuat Pada</label>
                        <p class="text-gray-900 text-lg">{{ $program->created_at }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1">Terakhir Diubah</label>
                        <p class="text-gray-900 text-lg">{{ $program->updated_at }}</p>
                    </div>

                    <hr class="my-8 border-yellow-300">

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.programs.index') }}"
                            class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                   font-semibold rounded-lg shadow-md transition duration-150">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>

                </div>

            </div>
        </section>

    </div>
</div>

{{-- SCRIPTS --}}
<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>

</body>
</html>

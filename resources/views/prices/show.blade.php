<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Detail Harga</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">

  <!-- Google Fonts -->
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
                        <a href="{{ route('admin.prices.index') }}"
                           class="text-gray-600 hover:text-yellow-700 mr-4 text-lg">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h1 class="text-xl font-semibold">Detail Harga</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.prices.index') }}">Harga</a></li>
                            <li class="breadcrumb-item active">Detail Harga</li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <!-- DETAIL DATA -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi Harga</h2>

                        <div class="space-y-3">

                            <div>
                                <p class="text-gray-600 font-semibold">ID</p>
                                <p class="text-lg">{{ $price->id }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Level</p>
                                <p class="text-lg">
                                    {{ $price->level->name_level ?? 'Tidak ada level' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Class</p>
                                <p class="text-lg">
                                    {{ $price->class->name_class ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Harga</p>
                                <p class="text-lg font-bold text-green-700">
                                    Rp {{ number_format($price->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Dibuat Pada</p>
                                <p class="text-lg">{{ $price->created_at }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Terakhir Diupdate</p>
                                <p class="text-lg">{{ $price->updated_at }}</p>
                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end mt-6">

                        <a href="{{ route('admin.prices.index') }}"
                           class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>

                        <a href="{{ route('admin.prices.edit', $price->id) }}"
                           class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>

                    </div>

                </div>

            </div>
        </section>

    </div>
</div>

    <!-- jQuery -->
    <script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>

</body>
</html>

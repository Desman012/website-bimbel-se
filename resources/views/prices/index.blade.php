<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Harga</title>

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
                <div class="row mb-2 pl-2.5">

                    <div class="col-sm-6">
                        <h1>Harga</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.dashboard') }}">Harga</a>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </section>

        <section class="content-header"></section>

        <!-- MAIN CONTENT -->
        <section class="content mx-auto p-4">
            <div class="container-fluid">

                <div class="bg-white p-8 rounded-xl shadow">

                    <!-- HEADER -->
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl font-bold text-gray-800">Manajemen Harga</h2>

                        <a href="{{ route('admin.prices.create') }}"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg font-semibold">
                            + Tambah Harga
                        </a>
                    </div>

                    <!-- TABLE -->
                    <table class="min-w-full border rounded-lg">
                        <thead class="bg-yellow-100">
                            <tr>
                                <th class="px-4 py-3 text-left">ID</th>
                                <th class="px-4 py-3 text-left">Level</th>
                                <th class="px-4 py-3 text-left">Class</th>
                                <th class="px-4 py-3 text-left">Harga</th>
                                <th class="px-4 py-3 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($prices as $price)
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="px-4 py-3">{{ $price->id }}</td>

                                <td class="px-4 py-3">
                                    {{ $price->level->name_level ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $price->class->name_class ?? '-' }}
                                </td>

                                <td class="px-4 py-3 font-semibold text-green-700">
                                    Rp {{ number_format($price->price, 0, ',', '.') }}
                                </td>

                                <td class="px-4 py-3 flex gap-2">

                                    {{-- LIHAT --}}
                                    <a href="{{ route('admin.prices.show', $price->id) }}"
                                        class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.prices.edit', $price->id) }}"
                                        class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.prices.destroy', $price->id) }}" method="POST"
                                          onsubmit="return confirm('Hapus harga ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    Belum ada data harga.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>

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

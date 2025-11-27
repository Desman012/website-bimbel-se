<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Time</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">
  <!-- Google Font -->
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
            <h1>Dashboard</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            </ol>
          </div>

        </div>
      </div>
    </section>

    <!-- Fix spacing -->
    <section class="content-header"></section>

    <!-- CONTENT -->
    <section class="content mx-auto p-4">
      <div class="container-fluid">

        <div class="bg-white p-8 rounded-xl shadow">

          <!-- Header -->
          <div class="flex justify-between items-center mb-5">
              <h2 class="text-2xl font-bold text-gray-800">Manajemen Jam Belajar</h2>

              <a href="{{ route('admin.times.create') }}"
                  class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg font-semibold">
                  + Tambah Time
              </a>
          </div>

          <!-- TABLE -->
          <table class="min-w-full border rounded-lg">
              <thead class="bg-yellow-100">
                  <tr>
                      <th class="px-4 py-3 text-left">ID</th>
                      <th class="px-4 py-3 text-left">Nama Time</th>
                      <th class="px-4 py-3 text-left">Masuk</th>
                      <th class="px-4 py-3 text-left">Keluar</th>
                      <th class="px-4 py-3 text-left">Action</th>
                  </tr>
              </thead>

              <tbody>
                  @forelse ($times as $time)
                      <tr class="border-b hover:bg-yellow-50">
                          <td class="px-4 py-3">{{ $time->id }}</td>

                          <td class="px-4 py-3">
                              {{ $time->name_time }}
                          </td>

                          <td class="px-4 py-3">
                              {{ $time->times_in ?? '-' }}
                          </td>

                          <td class="px-4 py-3">
                              {{ $time->times_out ?? '-' }}
                          </td>

                          <!-- Aksi -->
                          <td class="px-4 py-3 flex gap-2">

                              {{-- Lihat --}}
                              <a href="{{ route('admin.times.show', $time->id) }}"
                                  class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white 
                                         px-4 py-1 rounded">
                                  <i class="fas fa-eye"></i> Lihat
                              </a>

                              {{-- Edit --}}
                              <a href="{{ route('admin.times.edit', $time->id) }}"
                                  class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white 
                                         px-4 py-1 rounded">
                                  <i class="fas fa-edit"></i> Edit
                              </a>

                              {{-- Hapus --}}
                              <form action="{{ route('admin.times.destroy', $time->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus time ini?')">
                                  @csrf
                                  @method('DELETE')
                                  <button class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white 
                                                 px-4 py-1 rounded">
                                      <i class="fas fa-trash"></i> Hapus
                                  </button>
                              </form>

                          </td>
                      </tr>

                  @empty
                      <tr>
                          <td colspan="5" class="text-center py-4 text-gray-500">
                              Belum ada data time.
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

<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed ">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admins.layouts.navbar')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('admins.layouts.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
    <div class="row mb-2 mt-1">
        <div class="col-sm-6 pl-4">
            <div class="flex items-center"> 
                <a href="{{ route('admin.registrations.index') }}" class="text-gray-600 hover:text-yellow-700 mr-4 text-l">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1>Lihat Data Admin</h1>
            </div>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.registrations.index') }}">Admin</a></li>
                <li class="breadcrumb-item">Lihat Admin</></li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="container mx-auto p-4">
                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">
        
        <!-- Form Display (Tidak perlu tag <form> karena tidak ada submit) -->
        
        <!-- 1. Nama Lengkap -->
        <div class="mb-6">
            <label for="full_name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
            <input type="text" id="full_name" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                   value="{{ $admin->full_name }}" 
                   readonly> 
        </div>
        
        <!-- 2. Email -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                   value="{{ $admin->email }}"
                   readonly>
        </div>
        <!-- 4. Alamat -->
        <div class="mb-6">
            <label for="address" class="block text-gray-700 font-semibold mb-2">Alamat</label>
            <textarea id="address" rows="3"
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                   readonly>{{ $admin->address }}</textarea>
        </div>

        <hr class="my-8 border-yellow-300"> 
        
        <!-- 5. Status Akun -->
        <div class="mb-6">
            <label for="status" class="block text-gray-700 font-semibold mb-2">Status Akun</label>
            <input type="text" id="status" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                   value="{{ ucfirst($admin->status) }}" 
                   readonly>
        </div>

        <!-- Tombol Aksi (Opsional: Edit dan Hapus) -->
        <div class="flex justify-end mt-8">
            <a href="{{ route('admin.registrations.index') }}" 
               class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <!-- Anda bisa menaruh tombol hapus di sini jika diinginkan -->
        </div>

    </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"> 
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

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
                <a href="{{ route('admin.landing') }}" class="text-gray-600 hover:text-yellow-700 mr-4 text-l">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1>Edit Testimoni Baru</h1>
            </div>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.landing') }}">Landing</a></li>
                <li class="breadcrumb-item"><a href="#">Buat Testimoni</a></li>
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
                    <form method="POST" action="{{ route('admin.landing_update', $data->id) }}">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Terdapat kesalahan saat mengisi form.</span>
        </div>
    @endif

    <div class="mb-6">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
        <input type="text" id="name" name="name_student"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
               value="{{ old('name_student', $data->name_student) }}">
    </div>

    <div class="mb-6">
        <label for="school" class="block text-gray-700 font-semibold mb-2">Sekolah</label>
        <input type="text" id="school" name="school"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
               value="{{ old('school', $data->school) }}">
    </div>

    <div class="mb-6">
        <label for="review_text" class="block text-gray-700 font-semibold mb-2">Testimoni</label>
        <textarea id="review_text" name="review_text" rows="3"
                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                  >{{ old('review_text', $data->review_text) }}</textarea>
    </div>

    <div class="flex justify-end mt-8">
        <button type="submit" class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow-md transition duration-150">
            Update
        </button>
    </div>
</form>

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

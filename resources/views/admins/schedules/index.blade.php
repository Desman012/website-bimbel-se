<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Dashboard</title>
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
<body class="hold-transition sidebar-mini layout-fixed">
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- CONTENT -->
        <!-- FIX: wajib ada agar struktur AdminLTE tidak rusak -->
    <section class="content-header"></section>
        <section class="content mx-auto p-4">
            <div class="container-fluid">
                <div class="bg-white p-8 rounded-xl shadow">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">
                        Schedule Management
                    </h2>
                    <form action="{{ route('admin.schedules.store') }}" method="POST">
                        @csrf
                        <!-- Student -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Pilih Siswa</label>
                            <select name="student_id" class="w-full p-2 border rounded-lg">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

                            <!-- Day -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Hari</label>
                            <select name="day_id" class="w-full p-2 border rounded-lg">
                                @foreach($days as $day)
                                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Time -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Jam</label>
                            <select name="time_id" class="w-full p-2 border rounded-lg">
                                @foreach($times as $time)
                                    <option value="{{ $time->id }}">
                                        {{ $time->name_time }} ({{ $time->times_in }} - {{ $time->times_out }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Program -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Program</label>
                            <select name="program_id" class="w-full p-2 border rounded-lg">
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Curriculum -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Kurikulum</label>
                            <select name="curriculum_id" class="w-full p-2 border rounded-lg">
                                @foreach($curriculums as $c)
                                    <option value="{{ $c->id }}">{{ $c->name_curriculum }}</option>
                                @endforeach
                            </select>
                         </div>

                        <!-- Class -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Kelas</label>
                                <select name="class_id" class="w-full p-2 border rounded-lg">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->name_class }} - Level: {{ $class->level->name_level ?? '-' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label class="block mb-1 font-semibold text-gray-700">Harga</label>
                            <select name="price_id" class="w-full p-2 border rounded-lg">
                                @foreach($prices as $price)
                                    <option value="{{ $price->id }}">
                                        Rp {{ number_format($price->price, 0, ',', '.') }}
                                        ({{ $price->class->name_class ?? '-' }} - {{ $price->level->name_level ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button 
                            type="submit"
                            class="w-full bg-yellow-600 hover:bg-orange-700 text-white py-2 rounded-lg font-semibold">
                            Simpan Jadwal
                        </button>
                    </form>
                </div>
            </div>
            </section>
        </section>
</div>

</body>
</html>

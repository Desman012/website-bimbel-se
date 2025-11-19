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
        <div class="row mb-2">
          <div class="col-sm-6 pl-4">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container mx-auto p-4">
        <div class="bg-[#FFF9E3] p-6 rounded-xl shadow-lg">
            <div class="mb-6">
                <a href="{{ route('admin.registrations.create') }}" 
                class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                    <i class="fas fa-plus mr-2"></i> Buat Admin Baru
                </a>
            </div>
            <div class="mb-6">
                <input type="text" placeholder="Search..." 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-yellow-200/50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                Username
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                Status
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">      
                        @foreach ($admins as $admin)
                        <tr class="hover:bg-yellow-50/50 transition duration-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $admin->email }} 
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $admin->full_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $admin->status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                
                                <a href="{{ route('admin.registrations.show', $admin->id) }}" 
                                class="inline-flex items-center px-3 py-1 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow-md mr-1">
                                    <i class="fas fa-eye"></i> <span class="ml-1">Lihat</span>
                                </a>
                                
                                <a href="{{ route('admin.registrations.edit', $admin->id) }}" 
                                class="inline-flex items-center px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-md mr-1">
                                    <i class="fas fa-edit"></i> <span class="ml-1">Edit</span>
                                </a>
                                
                                <form action="{{ route('admin.registrations.destroy', $admin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 text-sm text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                        <i class="fas fa-trash"></i> <span class="ml-1">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @if (!$admin)
                            
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data admin yang ditemukan.
                            </td>
                        </tr>
                        @endif
                        @endforeach    
                    </tbody>
                </table>
            </div>   
            <div class="mt-4">
                {{ $admins->links() }}
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

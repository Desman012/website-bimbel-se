<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sinar Education | Edit Siswa</title>
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
                                {{-- <a href="{{ route('admin.students.show'), $students->id }}"
                                    class="text-gray-600 hover:text-yellow-700 mr-4 text-l">
                                    <i class="fas fa-arrow-left"></i>
                                </a> --}}
                                <!-- Menggunakan $student->full_name dari objek yang benar -->
                                <h1>Edit Data Siswa</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}">Siswa</a></li>
                                <li class="breadcrumb-item">Edit Siswa</li>
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

                            <!-- FORM START -->
                            <!-- Pastikan route 'admin.students.update' sudah didefinisikan dengan metode PUT/PATCH -->
                            <form action="{{ route('admin.students.update', $students->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <h2 class="text-lg font-bold mb-4 text-gray-800">Data Pribadi & Akademik</h2>

                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                        <strong class="font-bold">Oops!</strong>
                                        <span class="block sm:inline">Terdapat kesalahan saat mengisi form.</span>
                                    </div>
                                @endif

                                <!-- Grid Layout untuk Detail Utama -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                    <!-- Kolom Kiri -->
                                    <div>
                                        <!-- 1. Nama Lengkap -->
                                        <div class="mb-6">
                                            <label class="block text-gray-700 font-semibold mb-2" for="full_name">Nama Lengkap</label>
                                            <input type="text"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                                id="full_name"
                                                name="full_name" 
                                                value="{{ old('full_name', $students->full_name) }}"
                                                required>
                                            @error('full_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                        </div>

                                        <!-- 2. Jenjang (Menggunakan programs_id untuk input) -->
                                        <div class="mb-6">
                                            <label class="block text-gray-700 font-semibold mb-2" for="programs_id">Jenjang</label>
                                            <!-- Catatan: Untuk input yang benar, ini harusnya <select> dari data programs -->
                                            <input type="text" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                                id="name_level" 
                                                name="name-level" 
                                                value="{{ $jenjang->name_level}}" readonly>
                                        </div>
                                    </div>

                                    <!-- Kolom Kanan -->
                                    <div>
                                        <!-- 3. Nomor Kontak Siswa -->
                                        <div class="mb-6">
                                            <label class="block text-gray-700 font-semibold mb-2" for="phone_number">No. Siswa</label>
                                            <input type="text"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                                id="phone_number" 
                                                name="phone_number" 
                                                value="{{ old('phone_number', $students->phone_number) }}"
                                                required>
                                            @error('phone_number')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                        </div>

                                        <!-- 4. Nomor Kontak Orang Tua -->
                                        <div class="mb-6">
                                            <label class="block text-gray-700 font-semibold mb-2" for="parent_phone">No. Orang Tua</label>
                                            <input type="text"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                                id="parent_phone" 
                                                name="parent_phone" 
                                                value="{{ old('parent_phone', $students->parent_phone) }}"
                                                required>
                                            @error('parent_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- 5. Status Akun -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="status">Status Akun</label>
                                    <select 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="status" 
                                        name="status" 
                                        required>
                                        <option value="active" {{ old('status', $students->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $students->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <!-- 6. Alamat -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="address">Alamat</label>
                                    <textarea rows="3" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="address" 
                                        name="address" 
                                        required>{{ old('address', $students->address) }}</textarea>
                                    @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                
                                <!-- Tombol Aksi (Edit dan Batal) -->
                                <div class="flex justify-end mt-8">
                                    <a href="{{ route('admin.students.index', $students->id) }}"
                                        class="px-6 py-3 bg-gray-400 hover:bg-gray-500 text-white font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                                        <i class="fas fa-times mr-2"></i> Batal
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                            <!-- FORM END -->

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
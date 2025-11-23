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
                                <a href="{{ route('admin.students.index') }}"
                                    class="text-gray-600 hover:text-yellow-700 mr-4 text-l">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <h1>Lihat Data Siswa</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}">Siswa</a></li>
                                <li class="breadcrumb-item">Lihat Siswa</>
                                </li>
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
                            <h2 class="text-lg font-bold mb-4 text-gray-800">Data Pribadi & Akademik</h2>
                            <!-- Grid Layout untuk Detail Utama -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                                <!-- Kolom Kiri -->
                                <div>
                                    <!-- Nama Lengkap -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                                        <input type="text"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                            value="{{ $students->full_name }}" readonly>
                                    </div>
                                    <!-- Jenjang -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 font-semibold mb-2">Jenjang</label>
                                        <input type="text"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                            value="{{ $jenjang->name_level}}" readonly>
                                    </div>
                                </div>
                                <!-- Kolom Kanan -->
                                <div>
                                    <!-- Nomor Siswa -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 font-semibold mb-2">No. Siswa</label>
                                        <input type="text"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                            value="{{ $students->phone_number }}" readonly>
                                    </div>
                                    <!-- Nomor Kontak Orang Tua -->
                                    <div class="mb-6">
                                        <label class="block text-gray-700 font-semibold mb-2">No. Orang Tua</label>
                                        <input type="text"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                            value="{{ $students->parent_phone }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Alamat -->
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                                <textarea rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                    readonly>{{ $students->address }}</textarea>
                            </div>
                            <!-- Status Akun -->
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Status Akun</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                                    value="{{ ucfirst($students->status) }}" readonly>
                            </div>
                            <!-- ============================================== -->
                            <!-- BAGIAN RIWAYAT PEMBAYARAN -->
                            <!-- ============================================== -->
                            <h2 class="text-lg font-bold mb-4 text-gray-800">Riwayat Pembayaran</h2>
                            <div class="overflow-x-auto shadow-md rounded-lg mb-8">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-yellow-200/50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Bulan/Tahun</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Jumlah</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!-- Asumsi: $student->payments adalah relasi dari Model Pembayaran -->
                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $payment->bulan_tahun }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                                                    {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $payment->status == 'LUNAS' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $payment->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada
                                                    riwayat pembayaran.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-8 border-yellow-300">
                            <!-- ============================================== -->
                            <!-- BAGIAN RIWAYAT ABSENSI -->
                            <!-- ============================================== -->
                            <h2 class="text-lg font-bold mb-4 text-gray-800">Riwayat Absensi (30 Hari Terakhir)</h2>
                            <div class="overflow-x-auto shadow-md rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-yellow-200/50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Tanggal</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!-- Asumsi: $student->attendances adalah relasi dari Model Absensi -->
                                        @forelse ($attendances as $attendance)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <span 
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ 
                                                            $attendance->attendance_status == 'present'
                                                                ? 'bg-blue-100 text-blue-800'
                                                                : (
                                                                    $attendance->attendance_status == 'absent' 
                                                                        ? 'bg-orange-100 text-orange-800'
                                                                        : 'bg-gray-100 text-gray-800' // Titik koma (;) telah dihapus di sini
                                                                ) 
                                                        }}">
                                                        {{ $attendance->attendance_status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada
                                                    riwayat absensi dalam periode ini.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Tombol Aksi (Opsional: Edit dan Hapus) -->
                            <div class="flex justify-end mt-8">
                                <a href="{{ route('admin.students.index') }}"
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

@extends('admins.layouts.app')
@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

{{-- @section('content')
    <section class="content">
        <div class="container py-4">

            <!-- ========== JUDUL ========== -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-xl font-bold h5 fw-bold text-dark mb-0">
                        Selamat datang, {{ Auth::guard('admin')->user()->full_name ?? 'Admin' }}! 👋
                    </h2>
                </div>
            </div>

            <!-- ========== CARD DATA ========== -->
            <div class="row g-3">

                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="p-3 bg-primary text-white rounded me-3">
                                <i class="fas fa-user-graduate fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0">Total Siswa</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $totalSiswa }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="p-3 bg-warning text-white rounded me-3">
                                <i class="fas fa-hand-holding-usd fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0">Total Belum Bayar</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $unpaid }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="p-3 bg-success text-white rounded me-3">
                                <i class="fas fa-check-circle fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0">Total Sudah Bayar</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $sudahBayar }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========== TABEL DATATABLES ========== -->
            <div class="card mt-4 shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableSiswa" class="table table-bordered table-striped">
                            <thead class="table-warning">
                                <tr>
                                    <th>Email</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenjang</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->student_email }}</td>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->jenjang->name_level }}</td>
                                        <td>
                                            @if ($student->payment && $student->payment->status === 'verified')
                                                <span class="badge bg-success">Sudah Bayar</span>
                                            @else
                                                <span class="badge bg-danger">Belum Bayar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Tidak ada data siswa tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection --}}

@section('content')
    <section class="content">
        <div class="container py-4">
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
            <!-- Main content -->
            <section class="content">
                <div class="container mx-auto p-4">
                    <div class="mb-4 bg-white p-8 rounded-xl shadow border">
                        <h2 class="text-xl font-bold text-gray-800">
                            Selamat datang, {{ Auth::guard('admin')->user()->full_name ?? 'Admin' }}! 👋
                        </h2>
                    </div>
                    <div class="flex flex-wrap -mx-2">
                        <x-dashboard-card title="Total Siswa" count="{{ $totalSiswa }}"
                            iconClass="fas fa-user-graduate" bgColor="bg-yellow-100" iconBgColor="bg-blue-500" />

                        <x-dashboard-card title="Total Belum Bayar" count="{{ $unpaid }}"
                            iconClass="fas fa-hand-holding-usd" bgColor="bg-yellow-100" iconBgColor="bg-yellow-500" />

                        <x-dashboard-card title="Total Sudah Bayar" count="{{ $sudahBayar }}"
                            iconClass="fas fa-check-circle" bgColor="bg-yellow-100" iconBgColor="bg-green-600" />
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mt-8">
                    Tabel Siswa
                    </h2>
                    <div class="mt-4 bg-white p-8 rounded-xl shadow border">
                        <div class="overflow-x-auto shadow-md rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-yellow-200/50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Nama Siswa
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Jenjang
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Status Pembayaran
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-100 divide-y divide-gray-200">
                                        <!-- Asumsi: $student->attendances adalah relasi dari Model Absensi -->
                                        @forelse ($students as $student)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $student->student_email }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $student->full_name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $student->jenjang->name_level }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    @if ($student->payment && $student->payment->status === 'verified')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Sudah Bayar
                                                        </span>
                                                    @else
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Belum Bayar
                                                        </span>
                                                    @endif
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
                            <div>
                                <h6 class="fw-semibold mb-0">Total Siswa</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $totalSiswa }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="p-3 bg-warning text-white rounded me-3">
                                <i class="fas fa-hand-holding-usd fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0">Total Belum Bayar</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $unpaid }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="p-3 bg-success text-white rounded me-3">
                                <i class="fas fa-check-circle fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0">Total Sudah Bayar</h6>
                                <p class="fs-5 fw-bold mb-0">{{ $sudahBayar }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========== TABEL DATATABLES ========== -->
            <div class="card mt-4 shadow-sm border-0">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="tableSiswa" class="table table-bordered table-striped">
                            <thead class="table-warning">
                                <tr>
                                    <th>Email</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenjang</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->student_email }}</td>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->jenjang->name_level }}</td>
                                        <td>
                                            @if ($student->payment && $student->payment->status === 'verified')
                                                <span class="badge bg-success">Sudah Bayar</span>
                                            @else
                                                <span class="badge bg-danger">Belum Bayar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Tidak ada data siswa tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <!-- overlayScrollbars -->
    {{-- <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>
@endpush

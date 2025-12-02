@extends('admins.layouts.app')
@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

@section('content')
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="container mx-auto p-4">
                <div class="mb-4 bg-white p-8 rounded-xl shadow border">
                    <h2 class="text-xl font-bold text-gray-800">
                        Selamat datang, {{ Auth::guard('admin')->user()->full_name ?? 'Admin' }}! 👋
                    </h2>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <x-dashboard-card title="Total Siswa" count="{{ $totalSiswa }}" iconClass="fas fa-user-graduate"
                        bgColor="bg-blue-200" iconBgColor="bg-blue-500" />

                    <x-dashboard-card title="Total Belum Bayar" count="{{ $unpaid }}"
                        iconClass="fas fa-hand-holding-usd" bgColor="bg-yellow-200" iconBgColor="bg-yellow-500" />

                    <x-dashboard-card title="Total Sudah Bayar" count="{{ $sudahBayar }}" iconClass="fas fa-check-circle"
                        bgColor="bg-green-200" iconBgColor="bg-green-600" />
                </div>
                <h2 class="text-xl font-bold text-gray-800 mt-8">
                    Tabel Siswa
                </h2>
                <div class="mt-4 bg-white p-8 rounded-xl shadow border">
                    <div class="overflow-x-auto shadow-md rounded-lg">
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
                </div>
            </div>
        </section>
    </section>
@endsection

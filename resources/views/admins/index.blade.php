@extends('admins.layouts.app')

@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container py-4">

            <!-- ========== JUDUL ========== -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h2 class="h5 fw-bold text-dark mb-0">
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
@endsection

@push('scripts')
    <!-- overlayScrollbars -->
    {{-- <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>
@endpush

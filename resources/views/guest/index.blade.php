@extends('guest.layouts.app')
@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container" style="min-height: 100vh;">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-8">
                    <div class="card shadow-sm p-4">

                        <!-- Nama -->
                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Nama</div>
                            <div class="col-8">yuyu</div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Email</div>
                            <div class="col-8">u@gmail.com</div>
                        </div>

                        <!-- Status -->
                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Status</div>
                            <div class="col-8">pending</div>
                        </div>

                        <!-- Keterangan -->
                        <div class="row">
                            <div class="col-4 fw-bold">Keterangan</div>
                            <div class="col-8">Menunggu admin</div>
                        </div>
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
    {{-- <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script> --}}
@endpush

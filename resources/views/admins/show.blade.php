@extends('admins.layouts.app')

@section('title', 'Sinar Education | Program')
@section('title-content', 'Tambah Program')

@section('content')
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
                            value="{{ $admin->full_name }}" readonly>
                    </div>

                    <!-- 2. Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" id="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                            value="{{ $admin->email }}" readonly>
                    </div>
                    <!-- 4. Alamat -->
                    <div class="mb-6">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                        <textarea id="address" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default" readonly>{{ $admin->address }}</textarea>
                    </div>

                    <hr class="my-8 border-yellow-300">

                    <!-- 5. Status Akun -->
                    <div class="mb-6">
                        <label for="status" class="block text-gray-700 font-semibold mb-2">Status Akun</label>
                        <input type="text" id="status"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm cursor-default"
                            value="{{ ucfirst($admin->status) }}" readonly>
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
@endsection
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
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
    {{-- <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>

@extends('admins.layouts.app')

@section('title', 'Sinar Education | Program')
@section('title-content', 'Detail Program')

@section('content')
    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                <h2 class="text-xl font-semibold mb-6 text-gray-800">Informasi Program</h2>

                {{-- Informasi Program --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">ID Program</label>
                    <p class="text-gray-900 text-lg">{{ $program->id }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Nama Program</label>
                    <p class="text-gray-900 text-lg">{{ $program->name_program }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Dibuat Pada</label>
                    <p class="text-gray-900 text-lg">{{ $program->created_at }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Terakhir Diubah</label>
                    <p class="text-gray-900 text-lg">{{ $program->updated_at }}</p>
                </div>

                <hr class="my-8 border-yellow-300">

                {{-- Tombol Aksi --}}
                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.programs.index') }}"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                   font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>
@endsection

    {{-- <!-- jQuery -->
    <script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script> --}}

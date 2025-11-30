@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jam Belajar')
@section('title-content', 'Edit Jam Belajar')

@section('content')
    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                <form method="POST" action="{{ route('admin.times.update', $time->id) }}">
                    @csrf
                    @method('PUT')

                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Edit Time</h2>

                    {{-- Nama Time --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Time</label>

                        <input type="text" name="name_time" value="{{ $time->name_time }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            required>
                    </div>

                    {{-- Jam Masuk --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Jam Masuk (Opsional)</label>

                        <input type="time" name="times_in" value="{{ $time->times_in }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">
                    </div>

                    {{-- Jam Keluar --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Jam Keluar (Opsional)</label>

                        <input type="time" name="times_out" value="{{ $time->times_out }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">
                    </div>

                    <hr class="my-8 border-yellow-300">

                    {{-- ACTION BUTTONS --}}
                    <div class="flex justify-end mt-6">

                        <a href="{{ route('admin.times.index') }}"
                            class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold 
                                       rounded-lg shadow-md transition duration-150 mr-3">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold 
                                       rounded-lg shadow-md transition duration-150">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </section>
@endsection

    <!-- jQuery -->
    {{-- <script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script> --}}

@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jam Belajar')
@section('title-content', 'Tambah Jam Belajar')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                {{-- FORM --}}
                <form method="POST" action="{{ route('admin.times.store') }}">
                    @csrf

                    {{-- NAMA TIME --}}
                    <div class="mb-6">
                        <label for="name_time" class="block text-gray-700 font-semibold mb-2">
                            Nama Time
                        </label>

                        <input type="text" id="name_time" name="name_time" placeholder="Contoh: Pagi (08:00-10:00)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            value="{{ old('name_time') }}" required>
                    </div>

                    {{-- JAM MASUK --}}
                    <div class="mb-6">
                        <label for="times_in" class="block text-gray-700 font-semibold mb-2">
                            Jam Masuk (Opsional)
                        </label>

                        <input type="time" id="times_in" name="times_in"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            value="{{ old('times_in') }}">
                    </div>

                    {{-- JAM KELUAR --}}
                    <div class="mb-6">
                        <label for="times_out" class="block text-gray-700 font-semibold mb-2">
                            Jam Keluar (Opsional)
                        </label>

                        <input type="time" id="times_out" name="times_out"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            value="{{ old('times_out') }}">
                    </div>

                    {{-- SUBMIT BUTTON --}}
                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition">
                            Simpan Time
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

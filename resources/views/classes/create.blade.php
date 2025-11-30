@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kelas')
@section('title-content', 'Tambah Kelas')

@section('content')
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <form method="POST" action="{{ route('admin.classes.store') }}">
                        @csrf

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline"> Ada kesalahan pada input kamu.</span>
                            </div>
                        @endif

                        {{-- PILIH LEVEL --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">
                                Pilih Level
                            </label>

                            <select name="level_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                           focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm
                                           @error('level_id') border-red-500 @enderror">

                                <option value="">-- Pilih Level --</option>

                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}"
                                        {{ old('level_id') == $level->id ? 'selected' : '' }}>
                                        {{ $level->name_level }}
                                    </option>
                                @endforeach
                            </select>

                            @error('level_id')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- INPUT NAMA KELAS --}}
                        <div class="mb-6">
                            <label for="name_class" class="block text-gray-700 font-semibold mb-2">
                                Nama Kelas
                            </label>

                            <input type="text" id="name_class" name="name_class" placeholder="Contoh: Kelas 1 SD"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm
                                          @error('name_class') border-red-500 @enderror"
                                value="{{ old('name_class') }}">

                            @error('name_class')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- SUBMIT --}}
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                Simpan Kelas
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </section>
@endsection
    </div>
    </div>

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


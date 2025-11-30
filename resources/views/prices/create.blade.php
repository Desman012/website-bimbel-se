@extends('admins.layouts.app')

@section('title', 'Sinar Education | Harga')
@section('title-content', 'Tambah Harga')

@section('content')
        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                    <form method="POST" action="{{ route('admin.prices.store') }}">
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
<<<<<<< HEAD
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl 
=======
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
>>>>>>> 1708f347530efa02a1546a0b016a40095a82ee89
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

                        {{-- PILIH CLASS (OPSIONAL) --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">
                                Pilih Kelas (Opsional)
                            </label>

                            <select name="class_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                           focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm
                                           @error('class_id') border-red-500 @enderror">

                                <option value="">-- Tanpa Kelas --</option>

                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name_class }}
                                    </option>
                                @endforeach
                            </select>

                            @error('class_id')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- INPUT HARGA --}}
                        <div class="mb-6">
                            <label for="price" class="block text-gray-700 font-semibold mb-2">
                                Harga
                            </label>
                            <input type="number" id="price" name="price" placeholder="Contoh: 150000" step="0.01"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm
                                          @error('price') border-red-500 @enderror"
                                value="{{ old('price') }}">

                            @error('price')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- SUBMIT --}}
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                Simpan Harga
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

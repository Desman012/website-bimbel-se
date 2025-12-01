@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kelas')
@section('title-content', 'Edit Kelas')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                <form method="POST" action="{{ route('admin.classes.update', $class->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline"> Ada kesalahan saat mengubah data.</span>
                        </div>
                    @endif

                    {{-- LEVEL --}}
                    <div class="mb-6">
                        <label for="level_id" class="block text-gray-700 font-semibold mb-2">
                            Pilih Level
                        </label>

                        <select id="level_id" name="level_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">

                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ $class->level_id == $level->id ? 'selected' : '' }}>
                                    {{ $level->name_level }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- NAMA KELAS --}}
                    <div class="mb-6">
                        <label for="name_class" class="block text-gray-700 font-semibold mb-2">
                            Nama Kelas
                        </label>

                        <input type="text" id="name_class" name="name_class" value="{{ $class->name_class }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            required>
                    </div>

                    <hr class="my-8 border-yellow-300">

                    <!-- BUTTON -->
                    <div class="flex justify-end mt-4">

                        <a href="{{ route('admin.classes.index') }}"
                            class="px-6 py-2 bg-yellow-500 hover:bg-yellow-700 text-white 
                                      font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-700 text-white 
                                       font-semibold rounded-lg shadow-md transition duration-150">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </section>
@endsection

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


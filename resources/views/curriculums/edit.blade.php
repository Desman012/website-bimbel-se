@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kurikulum')
@section('title-content', 'Edit Kurikulum')

@section('content')
    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                <form method="POST" action="{{ route('admin.curriculums.update', $curriculum->id) }}">
                    @csrf
                    @method('PUT')

                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Edit Curriculum</h2>

                    {{-- Nama Curriculum --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Curriculum</label>
                        <input type="text" name="name_curriculum" value="{{ $curriculum->name_curriculum }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                   focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            required>
                    </div>

                    <hr class="my-8 border-yellow-300">

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.curriculums.index') }}"
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

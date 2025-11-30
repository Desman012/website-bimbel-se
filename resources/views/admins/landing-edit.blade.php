@extends('admins.layouts.app')

@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="container mx-auto p-4">
                <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">
                    <form method="POST" action="{{ route('admin.landing_update', $data->id) }}">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">Terdapat kesalahan saat mengisi form.</span>
                            </div>
                        @endif

                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name_student"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                value="{{ old('name_student', $data->name_student) }}">
                        </div>

                        <div class="mb-6">
                            <label for="school" class="block text-gray-700 font-semibold mb-2">Sekolah</label>
                            <input type="text" id="school" name="school"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                                value="{{ old('school', $data->school) }}">
                        </div>

                        <div class="mb-6">
                            <label for="review_text" class="block text-gray-700 font-semibold mb-2">Testimoni</label>
                            <textarea id="review_text" name="review_text" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">{{ old('review_text', $data->review_text) }}</textarea>
                        </div>

                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                Update
                            </button>
                        </div>
                    </form>

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

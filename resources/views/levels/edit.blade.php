@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jenjang')
@section('title-content', 'Edit Data Jenjang')

@section('content')
    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                <form method="POST" action="{{ route('admin.levels.update', $level->id) }}">
                    @csrf
                    @method('PUT')

                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Edit Level</h2>
                    {{-- Nama Level --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Level</label>
                        <input type="text" name="name_level" value="{{ $level->name_level }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                   focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            required>
                    </div>

                    <hr class="my-8 border-yellow-300">

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.levels.index') }}"
                            class="px-6 py-2 bg-yellow-500 hover:bg-yellow-700 text-white font-semibold 
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


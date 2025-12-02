@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jenjang')
@section('title-content', 'Detail Jenjang')

@section('content')
    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                <h2 class="text-xl font-semibold mb-6 text-gray-800">Informasi Level</h2>

                {{-- Informasi Level --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">ID Level</label>
                    <p class="text-gray-900 text-lg">{{ $level->id }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Nama Level</label>
                    <p class="text-gray-900 text-lg">{{ $level->name_level }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Dibuat Pada</label>
                    <p class="text-gray-900 text-lg">{{ $level->created_at }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-1">Terakhir Diubah</label>
                    <p class="text-gray-900 text-lg">{{ $level->updated_at }}</p>
                </div>

                <hr class="my-8 border-yellow-300">

                {{-- Tombol Aksi --}}
                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.levels.index') }}"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-700 text-white 
                                   font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>
@endsection

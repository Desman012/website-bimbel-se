@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jam Belajar')
@section('title-content', 'Manajemen Jam Belajar')

@section('content')
    <!-- CONTENT -->
    <section class="content mx-auto p-4">
        <div class="container-fluid">
            <div class="bg-white p-8 rounded-xl shadow">

                <!-- Header -->
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-2xl font-bold text-gray-800">Manajemen Jam Belajar</h2>

                    <a href="{{ route('admin.times.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold">
                        + Tambah Time
                    </a>
                </div>

                <!-- TABLE -->
                <table class="min-w-full border rounded-lg">
                    <thead class="bg-gray-200/50">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nama Time</th>
                            <th class="px-4 py-3 text-left">Masuk</th>
                            <th class="px-4 py-3 text-left">Keluar</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($times as $time)
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="px-4 py-3">{{ $time->id }}</td>

                                <td class="px-4 py-3">
                                    {{ $time->name_time }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $time->times_in ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $time->times_out ?? '-' }}
                                </td>

                                <!-- Aksi -->
                                <td class="px-4 py-3 flex gap-2">

                                    {{-- Lihat --}}
                                    <a href="{{ route('admin.times.show', $time->id) }}"
                                        class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white 
                                         px-4 py-1 rounded">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.times.edit', $time->id) }}"
                                        class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white 
                                         px-4 py-1 rounded">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('admin.times.destroy', $time->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus time ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white 
                                                 px-4 py-1 rounded">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    Belum ada data time.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection

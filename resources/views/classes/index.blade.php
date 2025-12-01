@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kelas')
@section('title-content', 'Manajemen Kelas')

@section('content')
    <!-- MAIN CONTENT -->
    <section class="content mx-auto p-4">
        <div class="container-fluid">

            <div class="bg-white p-8 rounded-xl shadow">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-2xl font-bold text-gray-800">Manajemen Kelas</h2>

                    <a href="{{ route('admin.classes.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold">
                        + Tambah Kelas
                    </a>
                </div>

                <!-- TABLE -->
                <table class="min-w-full border rounded-lg">
                    <thead class="bg-gray-200/50">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Level</th>
                            <th class="px-4 py-3 text-left">Nama Kelas</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($classes as $class)
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="px-4 py-3">{{ $class->id }}</td>

                                <td class="px-4 py-3">
                                    {{ $class->level->name_level ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $class->name_class }}
                                </td>

                                <td class="px-4 py-3 flex gap-2">

                                    {{-- LIHAT --}}
                                    <a href="{{ route('admin.classes.show', $class->id) }}"
                                        class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.classes.edit', $class->id) }}"
                                        class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- HAPUS --}}
                                    <a href="{{ route('admin.classes.destroy', $class->id) }}"
                                        onclick="return confirm('Hapus kelas ini?')"
                                        class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

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

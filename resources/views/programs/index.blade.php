@extends('admins.layouts.app')

@section('title', 'Sinar Education | Program')
@section('title-content', 'Manajemen Program')

@section('content')
    <!-- CONTENT -->
    <!-- FIX: wajib ada agar struktur AdminLTE tidak rusak -->
    <section class="content mx-auto p-4">
        <div class="container-fluid">
            <div class="bg-white p-8 rounded-xl shadow">

                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-2xl font-bold text-gray-800">Manajemen Program</h2>

                    <a href="{{ route('admin.programs.create') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg font-semibold">
                        + Tambah Program
                    </a>
                </div>

                <table class="min-w-full border rounded-lg">
                    <thead class="bg-yellow-100">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Program</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($programs as $program)
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="px-4 py-3">{{ $program->id }}</td>
                                <td class="px-4 py-3">{{ $program->name_program }}</td>

                                <td class="px-4 py-3 flex gap-2">

                                    {{-- LIHAT --}}
                                    <a href="{{ route('admin.programs.show', $program->id) }}"
                                        class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.programs.edit', $program->id) }}"
                                        class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus program ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-gray-500">
                                    Belum ada data program.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
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


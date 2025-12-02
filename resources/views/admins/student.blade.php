@extends('admins.layouts.app')

@section('title', 'Sinar Education | Program')
@section('title-content', 'Data Siswa')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="bg-[#FFFFFF] p-6 rounded-xl shadow-lg">
                <div class="mb-6 flex justify-between items-center">
                    <!-- Search Input -->
                    <input type="text" placeholder="Search..."
                        class="w-full max-w-sm px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">

                    <!-- Export Button -->
                    <a href="{{ route('admin.students.export') }}"
                        class="ml-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md transition">
                        <i class="fas fa-file-excel mr-2"></i> Export
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-200/50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Nama</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <tr class="hover:bg-yellow-50/50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->full_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $student->student_email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <a href="{{ route('admin.students.show', $student->id) }}"
                                            class="inline-flex items-center px-3 py-1 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow-md mr-1">
                                            <i class="fas fa-eye"></i> <span class="ml-1">Lihat</span>
                                        </a>
                                        <a href="{{ route('admin.students.edit', $student->id) }}"
                                            class="inline-flex items-center px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-md mr-1">
                                            <i class="fas fa-edit"></i> <span class="ml-1">Edit</span>
                                        </a>
                                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1 text-sm text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                                <i class="fas fa-trash"></i> <span class="ml-1">Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if (!$students->count())
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada data siswa tersedia.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>

            </div>
        </div>
    </section>

    <!-- /.content -->
@endsection

@extends('admins.layouts.app')

@section('title', 'Sinar Education | Manajemen Landing Page')
@section('title-content', 'Manajemen Landing Page')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <h2 class="text-xl font-bold text-gray-800 mb-4">
                Testimoni Siswa
            </h2>
            <div class="bg-[#FFFFFF] p-6 rounded-xl shadow-lg">
                <div class="mb-6">
                    <a href="{{ route('admin.landing_create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-plus mr-2"></i> Buat Testimoni Baru
                    </a>
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Search..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-200/50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Nama Siswa
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Asal Sekolah
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Testimoni
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($reviews as $review)
                                <tr class="hover:bg-yellow-50/50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $review->name_student }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $review->school }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $review->review_text }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">



                                        <a href="{{ route('admin.landing_edit', $review->id) }}"
                                            class="inline-flex items-center px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-md mr-1">
                                            <i class="fas fa-edit"></i> <span class="ml-1">Edit</span>
                                        </a>

                                        <form action="{{ route('admin.landing_destroy', $review->id) }}" method="POST"
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
                                @if (!$reviews)
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data admin yang ditemukan.
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $reviews->links() }}
                </div>

            </div>
            <h2 class="text-xl font-bold text-gray-800 mt-20 mb-2">
                Fasilitas Landing Page
            </h2>
            <div class="bg-[#FFFFFF] p-6 rounded-xl shadow-lg mt-5">
                <div class="mb-6">
                    <a href="{{ route('admin.landing_facilities_create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-plus mr-2"></i> Buat Fasilitas Baru
                    </a>
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Search..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm">
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-200/50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Nama Fasilitas
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Deskripsi
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider w-1/3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($facilities as $facility)
                                <tr class="hover:bg-yellow-50/50 transition duration-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $facility->name_facilities }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $facility->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">



                                        <a href="{{ route('admin.landing_facilities_edit', $facility->id) }}"
                                            class="inline-flex items-center px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-md mr-1">
                                            <i class="fas fa-edit"></i> <span class="ml-1">Edit</span>
                                        </a>

                                        <form action="{{ route('admin.landing_facilities_destroy', $facility->id) }}"
                                            method="POST" class="inline-block"
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
                                @if (!$facilities)
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data fasilitas yang ditemukan.
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $facilities->links() }}
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

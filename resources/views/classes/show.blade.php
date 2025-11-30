@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kelas')
@section('title-content', 'Detail Kelas')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                <!-- DETAIL DATA -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi Kelas</h2>

                    <div class="space-y-3">

                        <div>
                            <p class="text-gray-600 font-semibold">ID</p>
                            <p class="text-lg">{{ $class->id }}</p>
                        </div>

                        <div>
                            <p class="text-gray-600 font-semibold">Level</p>
                            <p class="text-lg">
                                {{ $class->level->name_level ?? 'Tidak ada level' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-600 font-semibold">Nama Kelas</p>
                            <p class="text-lg">{{ $class->name_class }}</p>
                        </div>

                        <div>
                            <p class="text-gray-600 font-semibold">Dibuat Pada</p>
                            <p class="text-lg">{{ $class->created_at }}</p>
                        </div>

                        <div>
                            <p class="text-gray-600 font-semibold">Terakhir Diupdate</p>
                            <p class="text-lg">{{ $class->updated_at }}</p>
                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="flex justify-end mt-6">

                    <a href="{{ route('admin.classes.index') }}"
                        class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>

                    <a href="{{ route('admin.classes.edit', $class->id) }}"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>

                </div>

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


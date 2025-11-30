@extends('admins.layouts.app')

@section('title', 'Sinar Education | Jenjang')
@section('title-content', 'Buat Data Jenjang Baru')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container mx-auto p-4">

            <div class="bg-[#FFF9E3] p-8 rounded-xl shadow-lg">

                <form method="POST" action="{{ route('admin.levels.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="name_level" class="block text-gray-700 font-semibold mb-2">
                            Nama Jenjang
                        </label>

                        <input type="text" id="name_level" name="name_level" placeholder="Masukkan nama level"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
              focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            value="{{ old('name_level') }}">

                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-lg shadow-md transition">
                            Simpan Level
                        </button>
                    </div>
                </form>


            </div>

        </div>
    </section>
    <!-- END CONTENT -->
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

    </body>

    </html>

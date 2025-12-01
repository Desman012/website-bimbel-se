@extends('admins.layouts.app')

@section('title', 'Sinar Education | Admin')
@section('title-content', 'Tambah Admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container mx-auto p-4">
                <div class="container mx-auto p-4">
                    <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">
                        <form method="POST" action="{{ route('admin.registrations.store') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                    role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">Terdapat kesalahan saat mengisi form.</span>
                                </div>
                            @endif
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="full_name" placeholder="Nama lengkap"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm border-red-500"
                                    value="{{ old('full_name') }}">
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input type="email" id="email" name="email" placeholder="Alamat email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm border-red-500"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm border-red-500">
                            </div>
                            <div class="mb-6">
                                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Konfirmasi
                                    Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Konfirmasi password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl">
                            </div>
                            <div class="mb-6">
                                <label for="address" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                                <textarea id="address" name="address" placeholder="Alamat tempat tinggal" rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm border-red-500"
                                    {{ old('address') }}>
                            </textarea>
                            </div>
                            <div class="mb-6">
                                <label for="status" class="block text-gray-700 font-semibold mb-2"></label>
                                <input type="hidden" id="name" name="status" value="active"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm border-red-500">
                            </div>
                            <div class="flex justify-end mt-8">
                                <button type="submit"
                                    class="px-6 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
@endsection
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{-- <!-- jQuery -->
<script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>
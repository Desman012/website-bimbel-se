@extends('admins.layouts.app')

@section('title', 'Sinar Education | Program')
@section('title-content', 'Tambah Program')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="container mx-auto p-4">
                <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                    <!-- FORM START -->
                    <!-- Pastikan route 'admin.students.update' sudah didefinisikan dengan metode PUT/PATCH -->
                    <form action="{{ route('admin.students.update', $students->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h2 class="text-lg font-bold mb-4 text-gray-800">Data Pribadi & Akademik</h2>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">Terdapat kesalahan saat mengisi form.</span>
                            </div>
                        @endif

                        <!-- Grid Layout untuk Detail Utama -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                            <!-- Kolom Kiri -->
                            <div>
                                <!-- 1. Nama Lengkap -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="full_name">Nama
                                        Lengkap</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="full_name" name="full_name" value="{{ old('full_name', $students->full_name) }}"
                                        required>
                                    @error('full_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- 2. Jenjang (Menggunakan programs_id untuk input) -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="programs_id">Jenjang</label>
                                    <!-- Catatan: Untuk input yang benar, ini harusnya <select> dari data programs -->
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="name_level" name="name-level" value="{{ $jenjang->name_level }}" readonly>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <!-- 3. Nomor Kontak Siswa -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="phone_number">No.
                                        Siswa</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="phone_number" name="phone_number"
                                        value="{{ old('phone_number', $students->phone_number) }}" required>
                                    @error('phone_number')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- 4. Nomor Kontak Orang Tua -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-semibold mb-2" for="parent_phone">No. Orang
                                        Tua</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        id="parent_phone" name="parent_phone"
                                        value="{{ old('parent_phone', $students->parent_phone) }}" required>
                                    @error('parent_phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- 5. Status Akun -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2" for="status">Status Akun</label>
                            <select
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                id="status" name="status" required>
                                <option value="active" {{ old('status', $students->status) == 'active' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="inactive"
                                    {{ old('status', $students->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 6. Alamat -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2" for="address">Alamat</label>
                            <textarea rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                id="address" name="address" required>{{ old('address', $students->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Aksi (Edit dan Batal) -->
                        <div class="flex justify-end mt-8">
                            <a href="{{ route('admin.students.index', $students->id) }}"
                                class="px-6 py-3 bg-gray-400 hover:bg-gray-500 text-white font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    <!-- FORM END -->

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

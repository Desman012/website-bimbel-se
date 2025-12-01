@extends('admins.layouts.app')

@section('title', 'Sinar Education | Kurikulum Baru')
@section('title-content', 'Tambah Kurikulum')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">
                <form method="POST" action="{{ route('admin.curriculums.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name_curriculum" class="block text-gray-700 font-semibold mb-2">
                            Nama Kurikulum
                        </label>

                        <input type="text" id="name_curriculum" name="name_curriculum"
                            placeholder="Masukkan nama kurikulum"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                      focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow-sm"
                            value="{{ old('name_curriculum') }}">
                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                            Simpan Kurikulum
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

</div>
</div>

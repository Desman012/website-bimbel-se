@extends('admins.layouts.app')

@section('title', 'Sinar Education | Harga')
@section('title-content', 'Detail Harga')

@section('content')

        <!-- Main Content -->
        <section class="content">
            <div class="container mx-auto p-4">

                <div class="bg-[#FFFFFF] p-8 rounded-xl shadow-lg">

                    <!-- DETAIL DATA -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi Harga</h2>

                        <div class="space-y-3">

                            <div>
                                <p class="text-gray-600 font-semibold">ID</p>
                                <p class="text-lg">{{ $price->id }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Level</p>
                                <p class="text-lg">
                                    {{ $price->level->name_level ?? 'Tidak ada level' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Class</p>
                                <p class="text-lg">
                                    {{ $price->class->name_class ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Harga</p>
                                <p class="text-lg font-bold text-green-700">
                                    Rp {{ number_format($price->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Dibuat Pada</p>
                                <p class="text-lg">{{ $price->created_at }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 font-semibold">Terakhir Diupdate</p>
                                <p class="text-lg">{{ $price->updated_at }}</p>
                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end mt-6">

                        <a href="{{ route('admin.prices.index') }}"
                            class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>

                        <a href="{{ route('admin.prices.edit', $price->id) }}"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>

                    </div>

                </div>

            </div>
        </section>
    <!-- /.content-wrapper -->
@endsection
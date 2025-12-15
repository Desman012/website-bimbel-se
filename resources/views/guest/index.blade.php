@extends('guest.layouts.app')
@section('title', 'Sinar Education | Dashboard')
@section('title-content', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container mx-auto p-4">
            <div class="bg-[#FFFFFF] p-6 rounded-xl shadow-lg">
                <!-- DETAIL DATA -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-5">Dashboard Siswa</h2>
                    <div class="space-y-3">
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Nama Lengkap</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-lg">{{ $getData }}</p>
                            </div>
                            @if ($getData->status == 'pending')
                                <div class="col-md-2">
                                    <p class="text-gray-600 font-semibold">Status</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-md badge bg-warning">
                                        {{ $getData->status }}
                                    </p>
                                </div>
                            @elseif ($getData->status == 'ditolak')
                                <div class="col-md-2">
                                    <p class="text-gray-600 font-semibold">Status</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-md badge bg-danger">
                                        {{ $getData->status }}
                                    </p>
                                </div>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Email Siswa</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-lg">
                                    {{ $getData->student_email }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Telepon</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-lg">
                                    {{ $getData->phone_number }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Nama Orang Tua</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-lg">
                                    {{ $getData->parent_name }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Email Orang Tua</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-lg">
                                    {{ $getData->parent_email }}
                                </p>
                            </div>
                        </div>
                        @if ($getData->status == 'ditolak')
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <p class="text-gray-600 font-semibold">Bukti Gambar</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-lg">
                                        {{ $getData->reason }}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-gray-600 font-semibold">Keterangan</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-lg">
                                        {{ $getData->reason }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- BUTTON -->
            {{-- <div class="flex justify-end mt-6">

                    <a href="{{ route('guest.classes.index') }}"
                        class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150 mr-3">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>

                    <a href="{{ route('admin.classes.edit', $class->id) }}"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white 
                                  font-semibold rounded-lg shadow-md transition duration-150">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                </div> --}}
        </div>
        </div>
    </section>
@endsection

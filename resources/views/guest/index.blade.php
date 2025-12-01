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
                            <div class="col-md-6">
                                <p class="text-lg">{{ $getData->full_name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Email Siswa</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-lg">
                                    {{ $getData->student_email }}
                                </p>
                            </div>
                        </div>
                        @if($getData->status == 'pending')
                        <div class="row">
                            <div class="col-md-2">
                                <p class="text-gray-600 font-semibold">Status</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-md badge bg-warning text-white">
                                    {{ $getData->status }}
                                </p>
                            </div>
                        </div>
                        
                            @elseif ($getData->status == 'ditolak')
                            <div class="col-md-6">
                                <p class="text-md badge bg-danger text-white">
                                    {{ $getData->status }}
                                </p>
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

@push('scripts')
@endpush

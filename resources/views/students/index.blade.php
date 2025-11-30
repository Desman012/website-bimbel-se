@extends('students.layouts.app')
@section('title', 'Sinar Education | Dashboard Siswa')
@section('title-content', 'Dashboard Siswa')
@section('content')
    <section class="content px-4 pb-4">
        <!-- WELCOME CARD -->
        <div class="mb-5 bg-white p-8 rounded-xl shadow border">
            <h2 class="text-xl font-bold text-gray-800">
                Selamat datang, {{ $authUser->full_name }}! 👋
            </h2>
            <p class="text-gray-600 mt-2">
                Berikut adalah ringkasan aktivitasmu hari ini di Sinar Education.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- CARD 1: Pengingat Absensi -->
            <div class="p-6 bg-white shadow rounded-xl border">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">Absensi Hari Ini</h2>

                @if ($attendanceToday)
                    @if ($attendanceToday->attendance_status === 'present')
                        <p class="text-green-600 font-semibold">✔ Kamu sudah absen hari ini.</p>
                    @else
                        <p class="text-red-600 font-semibold">✘ Kamu tidak hadir hari ini.</p>
                    @endif
                @else
                    <p class="text-orange-600 font-semibold">⚠ Belum melakukan absensi hari ini.</p>
                @endif
            </div>

            <!-- CARD 2: Statistik Masuk -->
            <div class="p-6 bg-white shadow rounded-xl border">
                <h2 class="text-lg font-semibold mb-3 text-gray-700">Statistik Absensi</h2>

                <div class="flex justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Masuk</p>
                        <p class="text-2xl font-bold text-green-600">{{ $totalMasuk }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Tidak Masuk</p>
                        <p class="text-2xl font-bold text-red-600">{{ $totalTidakMasuk }}</p>
                    </div>
                </div>
            </div>

            <!-- CARD 3: Status Pembayaran -->
            <div class="p-6 bg-white shadow rounded-xl border">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">Status Pembayaran</h2>

                @php
                    $month = now()->translatedFormat('F Y');
                @endphp

                <p class="text-gray-600 mb-2">Bulan: <b>{{ $month }}</b></p>

                @if (!$payment)
                    <p class="text-red-600 font-semibold">
                        ❌ Kamu belum melakukan pembayaran bulan ini.
                    </p>
                @else
                    @if ($payment->status === 'pending')
                        <p class="text-yellow-600 font-semibold">⏳ Menunggu verifikasi.</p>
                    @elseif($payment->status === 'success' || $payment->status === 'verified')
                        <p class="text-green-600 font-semibold">✔ Pembayaran sudah diterima.</p>
                    @else
                        <p class="text-red-600 font-semibold">❌ Pembayaran ditolak.</p>
                    @endif
                @endif
            </div>
        </div>

    </section>
@endsection

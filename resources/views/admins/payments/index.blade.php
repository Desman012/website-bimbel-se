@extends('admins.layouts.app')
@section('title', 'Sinar Education | Pembayaran Siswa')
@section('title-content', 'Pembayaran Siswa')

@section('content')
    <!-- MAIN CONTENT -->
    <section class="content mx-auto p-4">
        <div class="container-fluid">

            <div class="bg-white p-8 rounded-xl shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- HEADER -->
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl font-bold text-gray-800">Manajemen Pembayaran Siswa</h2>
                    </div>

                    <a href="{{ route('admin.payments.export') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md transition">
                        <i class="fas fa-file-excel mr-2"></i> Export
                    </a>
                </div>
                <!-- TABLE -->
                <table class="min-w-full border rounded-lg">
                    <thead class="bg-yellow-100">
                        <tr>
                            <th class="px-4 py-3 text-left">ID Siswa</th>
                            <th class="px-4 py-3 text-left">Bulan</th>
                            <th class="px-4 py-3 text-left">Jumlah</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Bukti</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($payments as $payment)
                            <tr class="border-b hover:bg-yellow-50">

                                <td class="px-4 py-3">
                                    {{ $payment->student_id }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $payment->month }}
                                </td>

                                <td class="px-4 py-3">
                                    Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}
                                </td>

                                <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded text-white 
                                @if ($payment->status == 'pending') bg-yellow-500
                                @elseif($payment->status == 'verified') bg-green-600
                                @elseif($payment->status == 'rejected') bg-red-600 @endif">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <a href="{{ asset('storage/' . $payment->payment_proof) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        Lihat Bukti
                                    </a>
                                </td>

                                <td class="px-4 py-3">

                                    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" onchange="this.form.submit()"
                                            class="border rounded px-2 py-1">
                                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="verified" {{ $payment->status == 'verified' ? 'selected' : '' }}>
                                                Verified</option>
                                            <option value="rejected" {{ $payment->status == 'rejected' ? 'selected' : '' }}>
                                                Rejected</option>
                                        </select>

                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">
                                    Belum ada data pembayaran.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection

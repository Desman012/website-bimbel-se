@extends('students.layouts.app')
@section('title', 'Sinar Education | Riwayat Pembayaran')
@section('title-content', 'Riwayat Pembayaran Siswa')
@section('content')
    <section class="content px-4 pb-4">
        <div class="overflow-x-auto rounded-xl border border-gray-300">
            <table class="w-full text-left">
                <thead class="bg-orange-400 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Bulan</th>
                        <th class="p-3">Nominal</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Bukti</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($payments as $index => $payment)
                        <tr class="border-b">
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3">{{ $payment->month }}</td>
                            <td class="p-3">
                                {{ number_format($payment->amount_paid, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                @if ($payment->status === 'pending')
                                    <span
                                        class="bg-yellow-200 text-yellow-700 px-3 py-1 rounded-full text-xs">Pending</span>
                                @elseif($payment->status === 'verified')
                                    <span class="bg-green-200 text-green-700 px-3 py-1 rounded-full text-xs">Verified</span>
                                @else
                                    <span class="bg-red-200 text-red-700 px-3 py-1 rounded-full text-xs">Rejected</span>
                                @endif
                            </td>
                            <td class="p-3">
                                <a href="{{ asset('storage/' . $payment->payment_proof) }}" target="_blank"
                                    class="text-blue-600 underline">
                                    Lihat Bukti
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('students.payment.index') }}"
                class="bg-[#F29E38] hover:bg-[#B73438] transition text-white font-semibold px-6 py-3 rounded-md shadow">
                Kembali ke Form Pembayaran
            </a>
        </div>
    </section>
@endsection
@push('scripts')
@endpush

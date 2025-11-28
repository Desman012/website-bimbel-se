<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembayaran | Sinar Education</title>

    <!-- AdminLTE + Tailwind -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-gray-100">

    <div class="wrapper">

        <!-- NAVBAR -->
        @include('students.layouts.navbar')

        <!-- SIDEBAR -->
        @include('students.layouts.sidebar')

        <!-- CONTENT WRAPPER -->
        <div class="content-wrapper">

                    <div class="mt-5 max-w-2xl mx-auto bg-[#F7E7A6] shadow-lg rounded-2xl p-8 border border-gray-200">

                <h2 class="text-3xl font-bold text-center text-[#B73438] mb-8 tracking-wide">
                    Riwayat Pembayaran
                </h2>

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
                        @foreach($payments as $index => $payment)
                            <tr class="border-b">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $payment->month }}</td>
                                <td class="p-3">
                                    {{ number_format($payment->amount_paid, 0, ',', '.') }}
                                </td>
                                <td class="p-3">
                                    @if($payment->status === 'pending')
                                        <span class="bg-yellow-200 text-yellow-700 px-3 py-1 rounded-full text-xs">Pending</span>
                                    @elseif($payment->status === 'verified')
                                        <span class="bg-green-200 text-green-700 px-3 py-1 rounded-full text-xs">Verified</span>
                                    @else
                                        <span class="bg-red-200 text-red-700 px-3 py-1 rounded-full text-xs">Rejected</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    <a href="{{ asset('storage/' . $payment->payment_proof) }}"
                                       target="_blank"
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

            </div>
        </div>
    </div>

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

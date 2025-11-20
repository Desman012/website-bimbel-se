<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FFFDF5]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-56 bg-gradient-to-b from-orange-300 to-yellow-200 p-6 flex flex-col shadow-md">

        <div class="flex flex-col items-center mb-14">
            <img src="{{ asset('favicon.ico') }}" class="w-20 h-20 mb-3">
            <h1 class="text-lg font-semibold text-gray-700">Siswa</h1>
        </div>

        <nav class="flex-1">
            <ul class="space-y-5">
                <li>
                    <a href="{{ route('students.dashboard') }}" class="text-gray-700 hover:text-[#B73438] transition block">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-[#B73438] transition block">
                        Landing Page
                    </a>
                </li>

                <li>
                    <a href="#" class="text-[#B73438] font-semibold block">
                        Siswa
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-auto">
            <a href="{{ route('logout') }}" class="text-gray-700 hover:text-red-600 transition block">
                Logout
            </a>
        </div>
    </div>
    <!-- END SIDEBAR -->


    <!-- MAIN CONTENT WRAPPER -->
    <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-orange-300 to-yellow-200 p-4 shadow-md flex justify-end">
            <div class="flex items-center">
                <div>
                    {{-- <p class="font-semibold text-gray-700">{{ $authUser->full_name }}</p> --}}
                    {{-- <p class="text-gray-500 text-sm">{{ $authUser->student_email }}</p> --}}
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT -->
        <div class="p-10 flex justify-center">

            <div class="w-full max-w-5xl bg-[#F7E7A6] shadow-xl rounded-2xl p-10 border border-gray-300">

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
</div>

</body>
</html>

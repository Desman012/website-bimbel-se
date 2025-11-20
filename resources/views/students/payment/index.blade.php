<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FFFDF5]">

<div class="flex min-h-screen">

    <!-- SIDEBAR BARU -->
    <div class="w-56 bg-gradient-to-b from-orange-300 to-yellow-200 p-6 flex flex-col shadow-md">

        <div class="flex flex-col items-center mb-14">
            <img src="{{ asset('favicon.ico') }}" class="w-20 h-20 mb-3">

            <h1 class="text-lg font-semibold text-gray-700">Siswa</h1>
        </div>

        <nav class="flex-1">
            <ul class="space-y-5">
                <li>
                    <a href="#" class="flex items-center text-gray-700 hover:text-[#B73438] transition">
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center text-gray-700 hover:text-[#B73438] transition">
                        <span class="ml-2">Landing Page</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center text-gray-700 font-semibold text-[#B73438]">
                        <span class="ml-2">Siswa</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-auto">
            <a href="{{ route('logout') }}" class="flex items-center text-gray-700 hover:text-red-600 transition">
                <span class="ml-2">Logout</span>
            </a>
        </div>

    </div>
    <!-- END SIDEBAR -->

    <!-- MAIN -->
    <div class="flex-1">

        <!-- HEADER BARU -->
        <div class="bg-gradient-to-r from-orange-300 to-yellow-200 p-4 flex justify-end shadow-md">
            <div class="flex items-center">
                <div>
                    <p class="font-semibold text-gray-700">{{ $authUser->full_name }}</p>
                    <p class="text-gray-500 text-sm">{{ $authUser->student_email }}</p>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="p-10">

            <div class="max-w-2xl mx-auto bg-[#F7E7A6] shadow-lg rounded-2xl p-8 border border-gray-200">

                <h2 class="text-2xl font-bold text-center mb-6 text-[#B73438] tracking-wide">
                    Pembayaran
                </h2>

                @if(session('status'))
                    <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                @if(isset($existingPayment))

                    <div class="bg-yellow-100 text-yellow-700 p-3 rounded-md mb-4">
                        Kamu sudah mengupload bukti pembayaran untuk bulan ini.
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-700 font-medium mb-2">Bukti Saat Ini:</p>
                        <img src="{{ asset('storage/' . $existingPayment->payment_proof) }}" class="w-40 rounded-md shadow">
                    </div>

                    {{-- <a href="{{ route('students.payment.cancel', $existingPayment->id) }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-semibold">
                        Cancel Bukti Pembayaran
                    </a> --}}

                    <a href="{{ route('students.payment.history') }}" class="text-[#B73438] font-semibold ml-4">
                        Lihat History Pembayaran
                    </a>

                @else

                <!-- FORM BARU -->
                <form action="{{ route('students.payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Bulan</label>
                        <input type="text" name="month" value="{{ $monthNow }}" readonly
                            class="w-full border-gray-300 rounded-md p-2 shadow-sm bg-gray-100">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Nominal</label>
                        <input type="number" name="amount_paid" value="{{ $amountPaid }}" readonly
                            class="w-full border-gray-300 rounded-md p-2 shadow-sm bg-gray-100">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Upload Bukti Pembayaran</label>
                        <input type="file" name="payment_proof" accept="image/*" required
                            class="w-full border-gray-300 rounded-md p-2 shadow-sm bg-white">
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('students.payment.history') }}" class="bg-orange-200 hover:bg-orange-300 text-[#B73438] px-4 py-2 rounded-md font-semibold">
                            Lihat History Pembayaran
                        </a>

                        <button type="submit" class="bg-[#F29E38] hover:bg-[#B73438] text-white font-semibold px-6 py-2 rounded-md shadow transition">
                            Kirim
                        </button>
                    </div>

                </form>

                @endif

            </div>

        </div>
    </div>

</div>

</body>
</html>

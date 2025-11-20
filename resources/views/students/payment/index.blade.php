<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa | Sinar Education</title>

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

            <!-- HEADER -->
            <section class="content-header px-4 pt-4">
                <h1 class="text-2xl font-semibold text-gray-800">Pembayaran Siswa</h1>
            </section>

            <!-- MAIN CONTENT -->
            <section class="content px-4 pb-4">
                    <!-- CARD 1: Pengingat Absensi -->
                    <div class="max-w-2xl mx-auto bg-[#F7E7A6] shadow-lg rounded-2xl p-8 border border-gray-200">

                        <h2 class="text-2xl font-bold text-center mb-6 text-[#B73438] tracking-wide">
                            Pembayaran
                        </h2>

                        @if (session('status'))
                            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (isset($existingPayment))
                            <div class="bg-yellow-100 text-yellow-700 p-3 rounded-md mb-4">
                                Kamu sudah mengupload bukti pembayaran untuk bulan ini.
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-700 font-medium mb-2">Bukti Saat Ini:</p>
                                <img src="{{ asset('storage/' . $existingPayment->payment_proof) }}"
                                    class="w-40 rounded-md shadow">
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
                            <form action="{{ route('students.payment.store') }}" method="POST"
                                enctype="multipart/form-data">
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
                                    <a href="{{ route('students.payment.history') }}"
                                        class="bg-orange-200 hover:bg-orange-300 text-[#B73438] px-4 py-2 rounded-md font-semibold">
                                        Lihat History Pembayaran
                                    </a>

                                    <button type="submit"
                                        class="bg-[#F29E38] hover:bg-[#B73438] text-white font-semibold px-6 py-2 rounded-md shadow transition">
                                        Kirim
                                    </button>
                                </div>

                            </form>
                        @endif

                </div>

            </section>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto mt-10">

        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-6">Dashboard Siswa</h1>

        <!-- GRID UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Pengingat Absensi -->
            <div class="p-6 rounded-xl shadow bg-[#FFF7CC] flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Pengingat Absensi Hari Ini</h2>

                    @if($attendanceToday)
                        @if($attendanceToday->attendance_status == 'present')
                            <p class="text-green-600 text-lg font-bold">Sudah Absen ✔</p>
                        @else
                            <p class="text-red-600 text-lg font-bold">Tidak Hadir ❌</p>
                        @endif
                    @else
                        <p class="text-yellow-600 text-lg font-bold">Belum Absen Hari Ini!</p>
                    @endif
                </div>

                <div class="bg-blue-500 text-white p-4 rounded-full shadow">
                    <i class="fa fa-calendar-check text-3xl"></i>
                </div>
            </div>

            <!-- Statistik Kehadiran -->
            <div class="p-6 rounded-xl shadow bg-[#FFF7CC] flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Statistik Kehadiran</h2>

                    <div class="mt-3">
                        <p class="text-3xl font-bold text-green-600">{{ $totalMasuk }}</p>
                        <p class="text-gray-600">Hadir</p>
                        <p class="text-3xl font-bold text-red-600 mt-4">{{ $totalTidakMasuk }}</p>
                        <p class="text-gray-600">Tidak Hadir</p>
                    </div>
                </div>

                <div class="bg-green-500 text-white p-4 rounded-full shadow">
                    <i class="fa fa-user-check text-3xl"></i>
                </div>
            </div>

            <!-- Alert Pembayaran -->
            <div class="p-6 rounded-xl shadow bg-[#FFF7CC] flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Pembayaran Bulanan</h2>

                    @if($payment === 'paid')
                        <p class="text-green-600 text-lg font-bold">Sudah Lunas ✔</p>

                    @elseif($payment === 'due')
                        <p class="text-yellow-600 text-lg font-bold">Belum Dibayar ⚠</p>

                    @elseif($payment === 'late')
                        <p class="text-red-600 text-lg font-bold">Terlambat Membayar ❌</p>

                    @else
                        <p class="text-gray-600">Belum ada informasi pembayaran.</p>
                    @endif
                </div>

                <div class="bg-red-500 text-white p-4 rounded-full shadow">
                    <i class="fa fa-wallet text-3xl"></i>
                </div>
            </div>

        </div>
    </div>

</body>
</html>

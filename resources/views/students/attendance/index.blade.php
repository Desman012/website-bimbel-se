<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Absensi Siswa | Sinar Education</title>

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
        <div class="content-wrapper ">
          <div class="mt-5 max-w-2xl mx-auto shadow-lg rounded-2xl p-8 border border-gray-200 mb-5">
            <div class="flex items-center justify-between">
                
                <div class="text-sm text-gray-400">11 Nov, 2025</div>
            </div>

            <!-- flash message -->
            @if (session('success'))
                <div class="mt-4 p-3 rounded-lg bg-green-50 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Working Time -->
            <div class="mt-6 bg-amber-50 rounded-2xl p-5 text-center">
                <h3 class="text-sm font-semibold text-gray-600 mb-3">Attendance Time</h3>
                <!-- JAM REAL-TIME -->
                <div id="clock" class="flex justify-center items-center space-x-2 text-3xl font-bold text-gray-800">
                    <span id="hours">--</span><span>:</span><span id="minutes">--</span><span class="text-lg"
                        id="ampm">--</span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Jl. Kampung Siluman No. 123, Tambun Selatan</p>

                <!-- replaced button with POST form -->
                <form action="{{ route('students.attendance.store') }}" method="POST" class="mt-4"
                    id="attendanceForm">
                    @csrf
                    <button type="submit" id="checkoutBtn" disabled
                        class="w-full bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2 px-6 rounded-xl shadow opacity-50 cursor-not-allowed">
                        Checkout
                    </button>
                </form>
                <p id="scheduleMsg" class="text-xs text-gray-500 mt-2">Akan tersedia pada 19:00 WIB</p>
            </div>

            <!-- Total Attendance -->
            <div class="mt-6">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-sm font-semibold text-gray-800">Total Attendance (Days)</h4>
                    <select class="text-xs border rounded-lg px-2 py-1">
                        <option>Jan</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option>May</option>
                        <option>Jun</option>
                        <option>Jul</option>
                        <option>Aug</option>
                        <option>Sep</option>
                        <option>Oct</option>
                        <option>Nov</option>
                        <option>Des</option>
                    </select>
                </div>

                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="bg-green-50 rounded-xl p-3">
                        <p class="text-2xl font-bold text-green-600">8</p>
                        <p class="text-xs text-gray-600">Present</p>
                    </div>
                    <div class="bg-yellow-50 rounded-xl p-3">
                        <p class="text-2xl font-bold text-yellow-600">2</p>
                        <p class="text-xs text-gray-600">Late</p>
                    </div>
                    <div class="bg-red-50 rounded-xl p-3">
                        <p class="text-2xl font-bold text-red-600">1</p>
                        <p class="text-xs text-gray-600">Absent</p>
                    </div>
                </div>
            </div>

            <!-- Working Hours -->
            <div class="mt-6">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-sm font-semibold text-gray-800">Today's Schedule</h4>
                    <p class="text-xs text-gray-500">19.00 – 21.00 WIB</p>
                </div>

                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
                        <span class="text-sm text-gray-600">Biologi</span>
                        <span class="text-sm font-semibold text-gray-900">60 minutes</span>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
                        <span class="text-sm text-gray-600">Matematika</span>
                        <span class="text-sm font-semibold text-gray-900">30 minutes</span>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
                        <span class="text-sm text-gray-600">Fisika</span>
                        <span class="text-sm font-semibold text-gray-900">30 minutes</span>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
<script>
                function updateClock() {
                    const now = new Date();
                    let hours = now.getHours();
                    let minutes = now.getMinutes();
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12 || 12;
                    document.getElementById('hours').textContent = String(hours).padStart(2, '0');
                    document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
                    document.getElementById('ampm').textContent = ampm;

                    // schedule check: enable only during 19:00 - 19:59 (client time)
                    const checkoutBtn = document.getElementById('checkoutBtn');
                    const scheduleMsg = document.getElementById('scheduleMsg');

                    const hour24 = now.getHours();
                    const hour = 13;
                    const allowed = (hour24 === hour); // semua menit jam 19

                    if (allowed) {
                        checkoutBtn.disabled = false;
                        checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                        scheduleMsg.textContent = 'Tersedia sekarang — silakan Checkout';
                    } else {
                        checkoutBtn.disabled = true;
                        if (!checkoutBtn.classList.contains('opacity-50')) {
                            checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        }
                        // hitung waktu tersisa sampai jam yang ditentukan
                        let target = new Date(now);
                        if (hour24 > hour) {
                            // jika lewat dari jam 19 hari ini, target besok 
                            target.setDate(target.getDate() + 1);
                        }
                        target.setHours(hour, 0, 0, 0);
                        const diffMs = target - now;
                        const diffH = Math.floor(diffMs / (1000 * 60 * 60));
                        const diffM = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                        scheduleMsg.textContent = `Akan tersedia dalam ${diffH} jam ${diffM} menit (${hour}:00 WIB)`;
                    }
                }

                updateClock(); // panggil pertama kali
                setInterval(updateClock, 1000); // update tiap detik
            </script>
</body>

</html>

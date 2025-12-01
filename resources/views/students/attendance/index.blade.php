@extends('students.layouts.app')
@section('title', 'Sinar Education | Absensi Siswa')
@section('title-content', 'Absensi Siswa')
@section('content')
    <section class="content px-4 pb-4">
        <!-- WELCOME CARD -->
        <div class="mb-5 bg-white p-8 rounded-xl shadow border">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-400">{{ now()->format('d M, Y') }}</div>
                <a href="{{ route('students.attendance.history') }}" class="text-sm text-blue">Attendance
                    History</a>
            </div>
            @if (session('success'))
                <div class="mt-4 p-3 rounded-lg bg-green-50 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mt-6 bg-amber-50 rounded-2xl p-5 text-center">
                <h3 class="text-sm font-semibold text-gray-600 mb-3">Attendance Time</h3>
                <div id="clock" class="flex justify-center items-center space-x-2 text-3xl font-bold text-gray-800">
                    <span id="hours">--</span><span>:</span><span id="minutes">--</span><span class="text-lg"
                        id="ampm">--</span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Jl. Kampung Siluman No. 123, Tambun Selatan</p>
                <form action="{{ route('students.attendance.store') }}" method="POST" class="mt-4" id="attendanceForm">
                    @csrf
                    <button type="submit" id="checkoutBtn" {{ isset($canAttend) && $canAttend ? '' : 'disabled' }}
                        class="w-full bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2 px-6 rounded-xl shadow {{ isset($canAttend) && $canAttend ? '' : 'opacity-50 cursor-not-allowed' }}">
                        Checkout
                    </button>
                </form>
                <p id="scheduleMsg" class="text-xs text-gray-500 mt-2">
                    @if (isset($hasAttended) && $hasAttended)
                        Anda sudah absen hari ini
                    @elseif(isset($todaySchedules) && count($todaySchedules) === 0)
                        Tidak ada jadwal hari ini.
                    @else
                        @if (isset($canAttend) && $canAttend)
                            Tersedia sekarang untuk jadwal Anda.
                        @else
                            Akses hanya pada waktu sesi yang terdaftar untuk hari ini.
                        @endif
                    @endif
                </p>
            </div>
            <!-- Total Attendance (dari DB per bulan) -->
                <div class="mt-6">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-sm font-semibold text-gray-800">Total Attendance (Days)</h4>

                        <!-- Dropdown bulan -->
                        <select id="monthSelect" class="text-xs border rounded-lg px-2 py-1">
                            @foreach ($months as $m)
                                @php
                                    $label = \Carbon\Carbon::createFromFormat('Y-m', $m)->format('M Y');
                                @endphp
                                <option value="{{ $m }}"
                                    {{ $m === ($selectedMonth ?? now()->format('Y-m')) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-3 text-center">
                        <div class="bg-green-50 rounded-xl p-3">
                            <p id="presentCount" class="text-2xl font-bold text-green-600">
                                {{ isset($presentCount) ? $presentCount : 0 }}</p>
                            <p class="text-xs text-gray-600">Present</p>
                        </div>
                        <div class="bg-red-50 rounded-xl p-3">
                            <p id="absentCount" class="text-2xl font-bold text-red-600">
                                {{ isset($absentCount) ? $absentCount : 0 }}</p>
                            <p class="text-xs text-gray-600">Absent</p>
                        </div>
                    </div>
                </div>
                <!-- Working Hours -->
                <div class="mt-6">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-sm font-semibold text-gray-800">Today's Schedule</h4>
                        <p class="text-xs text-gray-500">
                            @if (!empty($sessions) && $sessions->count())
                                {{ $sessions->first()->times_in }} – {{ $sessions->last()->times_out }} WIB
                            @else
                                08:00 – 18:00 WIB
                            @endif
                        </p>
                    </div>

                    <div class="space-y-3">
                        @if (!empty($sessions) && $sessions->count())
                            @foreach ($sessions as $s)
                                @php
                                    $start = \Carbon\Carbon::createFromFormat('H:i:s', $s->times_in);
                                    $end = \Carbon\Carbon::createFromFormat('H:i:s', $s->times_out);
                                    $minutes = $end->diffInMinutes($start);
                                @endphp
                                <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ $s->name_time }}</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $minutes }}
                                        minutes</span>
                                </div>
                            @endforeach
                        @else
                            <div class="bg-gray-50 rounded-xl p-3 flex justify-center items-center">
                                {{-- <span class="text-sm text-gray-600">Tidak ada jadwal</span> --}}
                                <span class="text-sm font-semibold text-gray-900">Tidak ada jadwal</span>
                            </div>
                        @endif
                    </div>
                </div>
              </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        const officeLocation = {
            lat: -6.2062592,
            lon: 106.8302336
        }; // contoh: Jakarta
        const maxDistance = 5; // jarak maksimum dalam kilometer (misal 500 meter)

        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // radius bumi (km)
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a = Math.sin(dLat / 2) ** 2 +
                Math.cos(lat1 * Math.PI / 180) *
                Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) ** 2;
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c; // jarak dalam km
        }

    //     navigator.geolocation.getCurrentPosition(pos => {
    //         const userLat = pos.coords.latitude;
    //         const userLon = pos.coords.longitude;
    //         console.log(userLat, userLon)
    //         const distance = getDistance(userLat, userLon, officeLocation.lat, officeLocation.lon);
    //         if (distance > maxDistance) {
    //             document.querySelector('.content').innerHTML = `
    //   <div class="flex h-screen items-center justify-center bg-gray-100 text-center">
    //     <p class="text-red-600 font-semibold text-lg">
    //       Akses ditolak! Anda tidak berada di area bimbel.
    //     </p>
    //   </div>
    // `;
    //         }
    //     }, err => {
    //         alert("Tidak bisa mendeteksi lokasi. Harap izinkan akses GPS.");
    //     });

        document.getElementById('monthSelect').addEventListener('change', function() {
            const m = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('month', m);
            window.location.href = url.toString();
        });

        // sesi dari server (id, name, start, end) — format waktu HH:MM:SS
        const sessions = [
            @foreach ($sessions as $s)
                {
                    id: {{ $s->id }},
                    name: {!! json_encode($s->name_time) !!},
                    start: {!! json_encode($s->times_in) !!},
                    end: {!! json_encode($s->times_out) !!}
                }
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        ];

        // sesi semua tetap untuk tampilan; tetapi JS aktivasi tombol hanya berdasarkan jadwal hari ini:
        const allowedSessions = {!! json_encode($todaySchedules ?? []) !!};
        const hasAttended = {!! json_encode(isset($hasAttended) ? $hasAttended : false) !!};
        const serverCanAttend = {!! json_encode(isset($canAttend) ? $canAttend : false) !!};

        // helper parse sama seperti sebelumnya
        function parseTimeToDate(timeStr, baseDate) {
            const parts = timeStr.split(':').map(Number);
            const d = new Date(baseDate);
            d.setHours(parts[0], parts[1], parts[2] || 0, 0);
            return d;
        }

        function msToHourMin(ms) {
            const totalMin = Math.floor(ms / (1000 * 60));
            const h = Math.floor(totalMin / 60);
            const m = totalMin % 60;
            return {
                h,
                m
            };
        }

        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            document.getElementById('hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('ampm').textContent = ampm;

            const checkoutBtn = document.getElementById('checkoutBtn');
            const scheduleMsg = document.getElementById('scheduleMsg');

            if (hasAttended) {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                scheduleMsg.textContent = 'Anda sudah absen hari ini';
                return;
            }

            // jika server sudah menandai boleh hadir (double-check), biarkan aktif
            if (serverCanAttend) {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                scheduleMsg.textContent = 'Tersedia sekarang untuk jadwal Anda.';
                return;
            }

            // selain itu, cek allowedSessions hari ini (sisi klien hanya sebagai safeguard)
            if (!allowedSessions || allowedSessions.length === 0) {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                scheduleMsg.textContent = 'Tidak ada jadwal hari ini.';
                return;
            }

            const nowTs = new Date(now);
            let active = null;
            let nextSession = null;
            let soonestDiff = Infinity;

            allowedSessions.forEach(s => {
                const start = parseTimeToDate(s.times_in, nowTs);
                const end = parseTimeToDate(s.times_out, nowTs);

                if (nowTs >= start && nowTs < end) {
                    active = s;
                } else if (nowTs < start) {
                    const diff = start - nowTs;
                    if (diff < soonestDiff) {
                        soonestDiff = diff;
                        nextSession = s;
                    }
                } else {
                    const startTomorrow = new Date(start);
                    startTomorrow.setDate(startTomorrow.getDate() + 1);
                    const diff = startTomorrow - nowTs;
                    if (diff < soonestDiff) {
                        soonestDiff = diff;
                        nextSession = s;
                    }
                }
            });

            if (active) {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                scheduleMsg.textContent =
                    `Tersedia sekarang — ${active.name_time} (${active.times_in} - ${active.times_out})`;
            } else {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                if (nextSession) {
                    const time = msToHourMin(soonestDiff);
                    console.log(now.getHours(), nextSession["times_out"].split(":")[0])
                    if (now.getHours() >= nextSession["times_out"].split(":")[0] && now.getMinutes() >= nextSession[
                            "times_out"].split(":")[1]) {
                        scheduleMsg.textContent = `Anda terlambat absensi`;
                    } else {
                        scheduleMsg.textContent =
                            `Akan tersedia dalam ${time.h} jam ${time.m} menit pada ${nextSession.name_time} mulai ${nextSession.times_in}`;
                    }
                } else {
                    scheduleMsg.textContent = 'Tidak ada sesi terjadwal untuk hari ini.';
                }
            }
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
@endpush

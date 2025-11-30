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
        @include('students.layouts.navbar')
        @include('students.layouts.sidebar')

        <div class="content-wrapper ">
            <!-- HEADER -->
            <section class="content-header px-4 pt-4">
                <h1 class="text-2xl font-semibold text-gray-800">Riwayat Absensi</h1>
            </section>

            <div class="mt-2 max-w-4xl mx-auto shadow-lg rounded-2xl p-6 border border-gray-200 mb-5 bg-white">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm text-gray-600">Daftar absensi per bulan</div>

                    <select id="monthSelect" class="text-sm border rounded-lg px-3 py-1">
                        @foreach($months as $m)
                            @php $label = \Carbon\Carbon::createFromFormat('Y-m', $m)->format('M Y'); @endphp
                            <option value="{{ $m }}" {{ ($m === ($selectedMonth ?? now()->format('Y-m'))) ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-left">
                                <th class="p-3 border-b">No</th>
                                <th class="p-3 border-b">Tanggal</th>
                                <th class="p-3 border-b">Hari</th>
                                <th class="p-3 border-b">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($records as $i => $r)
                                @php
                                    $dt = \Carbon\Carbon::parse($r->date);
                                @endphp
                                <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="p-3 border-b align-top">{{ $loop->iteration }}</td>
                                    <td class="p-3 border-b align-top">{{ $dt->format('d M Y') }}</td>
                                    <td class="p-3 border-b align-top">{{ $dt->format('l') }}</td>
                                    <td class="p-3 border-b align-top">
                                        @if($r->attendance_status === 'present')
                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">Present</span>
                                        @elseif($r->attendance_status === 'absent')
                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-800">Absent</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-800">{{ $r->attendance_status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-gray-500">
                                        Tidak ada data absensi untuk bulan ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-content-end">
                    <a href="{{ route('students.attendance.export', ['month' => $selectedMonth]) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2 px-6 rounded-xl shadow mt-10">
                    Download Excel
                    </a>
                </div>
            </div>
        </div>
    </div>

<script>
    document.getElementById('monthSelect').addEventListener('change', function () {
        const m = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('month', m);
        window.location.href = url.toString();
    });
</script>
</body>

</html>
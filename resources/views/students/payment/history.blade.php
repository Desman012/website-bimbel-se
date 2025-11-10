<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 border border-gray-200">
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Riwayat Pembayaran Mahasiswa</h2>

            <!-- Pesan jika belum ada data -->
            <div id="emptyMessage" class="hidden text-center text-gray-500 py-10">
                Belum ada data pembayaran.
            </div>

            <!-- Tabel riwayat -->
            <div class="overflow-x-auto">
                <table id="historyTable" class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-semibold">No</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Periode</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Nominal (Rp)</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Status</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Bukti</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                        <!-- Contoh data statis (nanti bisa diganti dengan data dari database) -->
                        <tr>
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">Semester Ganjil 2025</td>
                            <td class="py-3 px-4">350.000</td>
                            <td class="py-3 px-4">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Success</span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="#" class="text-blue-500 hover:underline text-sm">Lihat Bukti</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">2</td>
                            <td class="py-3 px-4">Semester Ganjil 2025</td>
                            <td class="py-3 px-4">750.000</td>
                            <td class="py-3 px-4">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">Process</span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="#" class="text-blue-500 hover:underline text-sm">Lihat Bukti</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol kembali -->
            <div class="text-center mt-6">
                <a href="{{ route('students.payment.index') }}"
                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-md shadow-md">
                    Kembali ke Form Pembayaran
                </a>
            </div>
        </div>
    </div>

    <script>
        // Simulasi jika tidak ada data (bisa dihapus nanti)
        const tableRows = document.querySelectorAll("#historyTable tbody tr");
        if (tableRows.length === 0) {
            document.getElementById("emptyMessage").classList.remove("hidden");
            document.getElementById("historyTable").classList.add("hidden");
        }
    </script>

</body>
</html>

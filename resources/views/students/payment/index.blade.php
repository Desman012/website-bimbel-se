<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-6 border border-gray-200">
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Form Pembayaran Mahasiswa</h2>

            <!-- Pesan sukses -->
            <div id="successMessage" class="hidden bg-green-100 text-green-700 p-3 rounded-md mb-4">
                Pembayaran berhasil dikirim! <br>
                <span class="font-semibold">Status:</span> <span id="paymentStatus" class="font-semibold">Process</span>
            </div>

            <!-- Pesan error -->
            <div id="errorMessage" class="hidden bg-red-100 text-red-700 p-3 rounded-md mb-4">
                Harap isi semua kolom terlebih dahulu.
            </div>

            <form id="paymentForm" action="#" method="POST" enctype="multipart/form-data">

                <!-- Periode -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Periode</label>
                    <input type="text" name="periode"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 p-2"
                           placeholder="Contoh: Semester Ganjil 2025" required>
                </div>

                <!-- Nominal -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nominal Pembayaran (Rp)</label>
                    <input type="number" name="nominal" min="0"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 p-2"
                           placeholder="Contoh: 500000" required>
                </div>

                <!-- Bukti Pembayaran -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Upload Gambar Bukti Pembayaran</label>
                    <input type="file" name="bukti" accept="image/*"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 p-2"
                           required>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('students.payment.history') }}" class="text-blue-600 hover:underline text-sm">Lihat Riwayat Pembayaran</a>

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-md shadow-md">
                        Kirim Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Simulasi kirim form & tampilkan status pembayaran
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const tanggal = this.tanggal.value;
            const periode = this.periode.value.trim();
            const jenjang = this.jenjang.value;
            const paket = this.paket.value;
            const nominal = this.nominal.value.trim();
            const bukti = this.bukti.files.length;

            if (!tanggal || !periode || !jenjang || !paket || !nominal || !bukti) {
                document.getElementById('errorMessage').classList.remove('hidden');
                document.getElementById('successMessage').classList.add('hidden');
                return;
            }

            // Sembunyikan error, tampilkan sukses
            document.getElementById('errorMessage').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');

            // Simulasi perubahan status (setelah 3 detik)
            const statusText = document.getElementById('paymentStatus');
            statusText.textContent = "Process";
            setTimeout(() => {
                const statuses = ["Success", "Reject"];
                const random = statuses[Math.floor(Math.random() * statuses.length)];
                statusText.textContent = random;
                statusText.classList.remove("text-green-700", "text-red-700");
                statusText.classList.add(random === "Success" ? "text-green-700" : "text-red-700");
            }, 3000);

            // Reset form
            this.reset();
        });
    </script>

</body>
</html>
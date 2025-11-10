<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi Siswa | Bimbel</title>
    @vite(['resources/css/auth.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen overflow-hidden bg-golden">
    <div class="grid h-full w-full grid-cols-2">
        <!-- Left Section: Form -->
        <div
            class="flex items-center w-[600px] justify-center bg-white rounded-tr-[44px] rounded-br-[44px] shadow-lg mr-auto">
            <div class="w-[450px] px-6">
                <h2 class="text-4xl font-bold mb-8 text-start">
                    PENDAFTARAN AKUN SISWA
                </h2>

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- STEP 1: Data Diri -->
                    <div class="step" id="step-1">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">1. Data Diri</h3>
                        <p class="text-sm text-gray-500 mb-4">Isi informasi pribadi kamu dengan lengkap ya!</p>

                        <label class="block mb-1 text-gray-700 font-semibold">Nama Lengkap</label>
                        <input type="text" name="full-name" placeholder="Jhon Doe"
                            class="w-full mb-4 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <label class="block mb-1 text-gray-700 font-semibold">Alamat</label>
                        <input type="text" name="password" placeholder="Jl. Merdeka No. 123"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                            <label class="block mb-1 text-gray-700 font-semibold">Nama Lengkap</label>
                        <input type="tel" name="full-name" placeholder="Jhon Doe"
                            class="w-full mb-4 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />


                        <div class="flex justify-end">
                            <button type="button" onclick="nextStep(2)"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 2: Data Orang Tua -->
                    <div class="step hidden" id="step-2">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">2. Data Orang Tua</h3>
                        <p class="text-sm text-gray-500 mb-4">Masukkan informasi orang tua atau wali kamu.</p>

                        <label class="block mb-1 text-gray-700 font-semibold">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" placeholder="contoh: Budi Santoso"
                            class="w-full mb-4 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <label class="block mb-1 text-gray-700 font-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" placeholder="contoh: Karyawan Swasta"
                            class="w-full mb-4 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <label class="block mb-1 text-gray-700 font-semibold">No. HP Orang Tua</label>
                        <input type="tel" name="no_hp" placeholder="contoh: 081234567890"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(1)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" onclick="nextStep(3)"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 3: Data Bimbel -->
                    <div class="step hidden" id="step-3">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">3. Data Bimbel</h3>
                        <p class="text-sm text-gray-500 mb-4">Pilih jenjang dan kelas yang akan kamu ikuti.</p>

                        <label class="block mb-1 text-gray-700 font-semibold">Jenjang</label>
                        <select name="jenjang"
                            class="w-full mb-4 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                            <option value="" disabled selected>Pilih Jenjang</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                        </select>

                        <label class="block mb-1 text-gray-700 font-semibold">Kelas</label>
                        <input type="text" name="kelas" placeholder="contoh: 12 IPA"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(2)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" onclick="nextStep(4)"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 4: Bukti Pembayaran -->
                    <div class="step hidden" id="step-4">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">4. Bukti Pembayaran</h3>
                        <p class="text-sm text-gray-500 mb-4">Unggah bukti pembayaran untuk melanjutkan pendaftaran.</p>

                        <label class="block mb-1 text-gray-700 font-semibold">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base font-medium text-slate-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required />

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(3)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="submit"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Daftar
                                Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex flex-col justify-center px-16 bg-golden text-gray-900">
            <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo"
                class="w-32 mb-6 brightness-0 invert-0" />
            <h1 class="text-4xl font-bold leading-snug mb-4">
                Gabung Bersama <br>Bimbel Sinar Education 🌟
            </h1>
            <p class="text-lg mb-4 text-gray-800">
                Belajar jadi lebih seru dan efektif dengan mentor berpengalaman!
            </p>
            <a href="{{ route('login') }}"
                class="px-5 py-3 bg-white text-crimson rounded-lg font-semibold shadow hover:-translate-y-1 transition-transform">
                Sudah punya akun? Masuk
            </a>
        </div>
    </div>

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');
        }

        function nextStep(step) {
            currentStep = step;
            showStep(step);
        }

        function prevStep(step) {
            currentStep = step;
            showStep(step);
        }
    </script>
</body>

</html>

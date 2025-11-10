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
        <div class="flex items-center w-[600px] justify-center bg-white rounded-tr-[44px] rounded-br-[44px] shadow-lg mr-auto">
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

                        <div class="input-group">
                            <input type="text" id="nama" name="nama" class="input-field" placeholder=" " required />
                            <label for="nama" class="input-label">Nama Lengkap</label>
                        </div>

                        <div class="input-group">
                            <input type="email" id="email" name="email" class="input-field" placeholder=" " required />
                            <label for="email" class="input-label">Email</label>
                        </div>

                        <div class="input-group">
                            <input type="password" id="password" name="password" class="input-field" placeholder=" " required />
                            <label for="password" class="input-label">Kata Sandi</label>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="nextStep(2)" class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 2: Data Orang Tua -->
                    <div class="step hidden" id="step-2">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">2. Data Orang Tua</h3>
                        <p class="text-sm text-gray-500 mb-4">Masukkan informasi orang tua atau wali kamu.</p>

                        <div class="input-group">
                            <input type="text" id="nama_ortu" name="nama_ortu" class="input-field" placeholder=" " required />
                            <label for="nama_ortu" class="input-label">Nama Orang Tua</label>
                        </div>

                        <div class="input-group">
                            <input type="text" id="pekerjaan" name="pekerjaan" class="input-field" placeholder=" " required />
                            <label for="pekerjaan" class="input-label">Pekerjaan</label>
                        </div>

                        <div class="input-group">
                            <input type="tel" id="no_hp" name="no_hp" class="input-field" placeholder=" " required />
                            <label for="no_hp" class="input-label">No. HP Orang Tua</label>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(1)" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" onclick="nextStep(3)" class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 3: Data Bimbel -->
                    <div class="step hidden" id="step-3">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">3. Data Bimbel</h3>
                        <p class="text-sm text-gray-500 mb-4">Pilih jenjang dan kelas yang akan kamu ikuti.</p>

                        <div class="input-group">
                            <select id="jenjang" name="jenjang" class="input-field border-none border-b-2 border-gray-300 focus:border-crimson">
                                <option value="" disabled selected>Pilih Jenjang</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                            </select>
                            <label for="jenjang" class="input-label">Jenjang</label>
                        </div>

                        <div class="input-group">
                            <input type="text" id="kelas" name="kelas" class="input-field" placeholder=" " required />
                            <label for="kelas" class="input-label">Kelas</label>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(2)" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" onclick="nextStep(4)" class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- STEP 4: Bukti Pembayaran -->
                    <div class="step hidden" id="step-4">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">4. Bukti Pembayaran</h3>
                        <p class="text-sm text-gray-500 mb-4">Unggah bukti pembayaran untuk melanjutkan pendaftaran.</p>

                        <div class="input-group">
                            <input type="file" id="bukti" name="bukti" class="input-field" placeholder=" " required />
                            <label for="bukti" class="input-label">Upload Bukti Pembayaran</label>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(3)" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="submit" class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Daftar Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Section: Gambar -->
        <div class="flex flex-col justify-center px-16 bg-golden text-gray-900">
            <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo" class="w-32 mb-6 brightness-0 invert-0" />
            <h1 class="text-4xl font-bold leading-snug mb-4">
                Gabung Bersama <br>Bimbel Sinar Education 🌟
            </h1>
            <p class="text-lg mb-4 text-gray-800">
                Belajar jadi lebih seru dan efektif dengan mentor berpengalaman!
            </p>
            <a href="{{ route('login') }}" class="px-5 py-3 bg-white text-crimson rounded-lg font-semibold shadow hover:-translate-y-1 transition-transform">
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

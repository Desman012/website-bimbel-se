<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi Siswa | Bimbel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @vite(['resources/css/auth.css', 'resources/css/app.css', 'resources/js/app.js'])
    <style>
        .required::after {
            content: " *";
            color: red;
        }

        input:invalid,
        textarea:invalid,
        select:invalid {
            border-color: whitesmoke !important;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-r from-orange-50 to-red-50 overflow-x-hidden">
    <div class="grid lg:grid-cols-2 min-h-screen">
        <!-- LEFT SECTION: FORM -->
        <div class="flex justify-center w-[600px] items-center bg-white rounded-tr-[44px] rounded-br-[44px] shadow-lg ">
            <div class="w-full max-w-[450px] px-6 py-8">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6 text-start">
                    PENDAFTARAN AKUN SISWA
                </h2>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registerForm">
                    @csrf

                    {{-- STEP 1: DATA AKUN --}}
                    <div class="step" id="step-1">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">1. Data Akun</h3>
                        <p class="text-sm text-gray-500 mb-4">Masukkan email dan password kamu!</p>

                        <label class="block mb-1 font-semibold text-gray-700 required">Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh: jhondoe@mail.com"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            required />

                        <label class="block mb-1 font-semibold text-gray-700 required">Password</label>
                        <div class="relative mb-4">
                            <input type="password" id="password" name="password" placeholder="lebih 8 karakter"
                                class="w-full border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none pr-10"
                                required />
                            <span id="togglePassword" class="absolute right-2 top-2 cursor-pointer text-gray-500">
                                <i class="fa-regular fa-eye"></i>
                            </span>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" id="next1"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    {{-- STEP 2: DATA DIRI --}}
                    <div class="step hidden" id="step-2">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">2. Data Diri</h3>
                        <p class="text-sm text-gray-500 mb-4">Isi informasi akun kamu dengan lengkap ya!</p>

                        <label class="block mb-1 font-semibold text-gray-700 required">Nama Lengkap</label>
                        <input type="text" id="full-name" name="full-name" placeholder="contoh: Jhon Doe"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            oninput="this.value = this.value.replace(/[^a-zA-ZÀ-ž\s]/g, '');" required />

                        <label class="block mb-1 font-semibold text-gray-700 required">Nomor Whatsapp</label>
                        <input type="text" id="phone" name="phone" placeholder="contoh: 085123xxxx"
                            maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            required />

                        <label class="block mb-1 font-semibold text-gray-700 required">Alamat</label>
                        <textarea id="address" name="address" placeholder="contoh: Jl. Merdeka No. 123, Karawang"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none resize-none"
                            required></textarea>

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(1)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" id="next2"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    {{-- STEP 3: DATA ORANG TUA --}}
                    <div class="step hidden" id="step-3">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">3. Data Orang Tua</h3>
                        <p class="text-sm text-gray-500 mb-4">Masukkan informasi orang tua atau wali kamu.</p>

                        <label class="block mb-1 font-semibold text-gray-700 required">Nama Orang Tua</label>
                        <input type="text" id="parent-name" name="parent-name" placeholder="contoh: Budi Santoso"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            oninput="this.value = this.value.replace(/[^a-zA-ZÀ-ž\s]/g, '');" required />

                        <label class="block mb-1 font-semibold text-gray-700 required">Email Orang Tua</label>
                        <input type="email" id="parent-email" name="parent-email"
                            placeholder="contoh: budisantoso@mail.com"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            required />

                        <label class="block mb-1 font-semibold text-gray-700 required">Nomor Whatsapp Orang Tua</label>
                        <input type="text" id="parent-phone" name="parent-phone" placeholder="contoh: 085123xxxx"
                            maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 text-base focus:ring-2 focus:ring-golden focus:outline-none"
                            required />

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(2)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" id="next3"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    {{-- STEP 4: DATA BIMBEL --}}
                    <div class="step hidden" id="step-4">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">4. Data Bimbel</h3>
                        <p class="text-sm text-gray-500 mb-4">Masukan data bimbel yang ingin kamu ikuti.</p>

                        <label class="block mb-1 font-semibold text-gray-700 required">Program</label>
                        <select name="program-id" id="programSelect"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 focus:ring-2 focus:ring-golden focus:outline-none"
                            required>
                            <option value="" disabled selected>Pilih Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                            @endforeach
                        </select>

                        <label class="block mb-1 font-semibold text-gray-700 required">Kurikulum</label>
                        <select name="curriculum-id" id="curriculumSelect"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 focus:ring-2 focus:ring-golden focus:outline-none"
                            required>
                            <option value="" disabled selected>Pilih Kurikulum</option>
                            @foreach ($curriculums as $curriculum)
                                <option value="{{ $curriculum->id }}">{{ $curriculum->name_curriculum }}</option>
                            @endforeach
                        </select>

                        <label class="block mb-1 font-semibold text-gray-700 required">Jenjang</label>
                        <select name="level-id" id="jenjangSelect"
                            class="w-full mb-3 border-b border-gray-300 px-3 py-2 focus:ring-2 focus:ring-golden focus:outline-none"
                            required>
                            <option value="" disabled selected>Pilih Jenjang</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name_level }}</option>
                            @endforeach
                        </select>

                        <label class="block mb-1 font-semibold text-gray-700 required">Kelas</label>
                        <select name="class-id" id="kelasSelect"
                            class="w-full mb-6 border-b border-gray-300 px-3 py-2 focus:ring-2 focus:ring-golden focus:outline-none"
                            required>
                            <option value="" disabled selected>Pilih Kelas</option>
                        </select>

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(3)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="button" onclick="nextStep(5)"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Selanjutnya</button>
                        </div>
                    </div>

                    {{-- STEP 5: PEMBAYARAN --}}
                    <div class="step hidden" id="step-5">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">5. Bukti Pembayaran</h3>
                        <p class="text-sm text-gray-500 mb-4">Unggah bukti pembayaran untuk melanjutkan pendaftaran.
                        </p>

                        <div class="mb-4">
                            <p class="text-gray-700 font-semibold">Nominal Pembayaran:</p>
                            <p id="nominalDisplay" class="text-lg font-bold text-crimson">Rp -</p>
                            <input type="hidden" name="amount-paid" id="amount-paid">
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-700 font-semibold">Nomor Rekening:</p>
                            <p class="text-base font-medium">BCA 1234567890 a.n Bimbel Sinar Education</p>
                        </div>

                        <label class="block mb-1 font-semibold text-gray-700 required">Upload Bukti Pembayaran</label>
                        <input type="file" name="payment-proof" accept="image/*"
                            class="w-full mb-6 border-gray-300 px-3 py-2 focus:ring-2 focus:ring-golden focus:outline-none"
                            required />

                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(4)"
                                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:-translate-y-1 transition-transform">Kembali</button>
                            <button type="submit"
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Daftar
                                Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT SECTION -->
        <div class="flex flex-col justify-center px-16 text-gray-900 mr-6 bg-gradient-to-r from-orange-50 to-red-50">
            <div class="w-[600px]">

                <img src="{{ Vite::asset('resources/img/logo-panjang.png') }}" alt="Logo"
                    class="w-[295px] mb-3 brightness-0 invert-0" />
                <h1 class="text-4xl font-bold text-red-500 leading-tight mb-4">
                    Gabung Bersama Bimbel<br> <span class="text-orange-600"> Sinar Education</span>
                </h1>
                <p class="text-lg mb-4 mr-6 text-gray-800">
                    Belajar lebih seru dan efektif bersama mentor berpengalaman yang siap membimbingmu meraih potensi
                    terbaik!
                </p>
                <p class="text-lg text-gray-500">
                    Sudah punya akun?
                </p>
                <a href="{{ route('login') }}"
                    class="mt-2 w-[100px] justify-start items-start flex px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:-translate-y-1 transition-transform">
                    Masuk
                </a>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');
            window.scrollTo(0, 0);
        }

        function nextStep(step) {
            currentStep = step;
            showStep(step);
        }

        function prevStep(step) {
            currentStep = step;
            showStep(step);
        }

        // Show / Hide Password
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        togglePassword.addEventListener('click', () => {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePassword.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            } else {
                passwordField.type = 'password';
                togglePassword.innerHTML = '<i class="fa-regular fa-eye"></i>';
            }
        });


        // Validasi Step 1
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const next1 = document.getElementById('next1');

        function validateStep1() {
            if (email.validity.valid && password.value.trim() !== '') {
                next1.classList.remove('opacity-60', 'cursor-not-allowed');
                next1.onclick = () => nextStep(2);
            } else {
                next1.classList.add('opacity-60', 'cursor-not-allowed');
                next1.onclick = null;
            }
        }
        email.addEventListener('input', validateStep1);
        password.addEventListener('input', validateStep1);

        // Validasi Step 2
        const full_name = document.getElementById('full-name');
        const phone = document.getElementById('phone');
        const address = document.getElementById('address');
        const next2 = document.getElementById('next2');

        function validateStep2() {
            if (full_name.value.trim() && phone.value.trim() && address.value.trim()) {
                next2.classList.remove('opacity-60', 'cursor-not-allowed');
                next2.onclick = () => nextStep(3);
            } else {
                next2.classList.add('opacity-60', 'cursor-not-allowed');
                next2.onclick = null;
            }
        }
        [full_name, phone, address].forEach(el => el.addEventListener('input', validateStep2));

        // Validasi Step 3
        const parent_name = document.getElementById('parent-name');
        const parent_email = document.getElementById('parent-email');
        const parent_phone = document.getElementById('parent-phone');
        const next3 = document.getElementById('next3');

        function validateStep3() {
            if (parent_name.value.trim() && parent_email.validity.valid && parent_phone.value.trim()) {
                next3.classList.remove('opacity-60', 'cursor-not-allowed');
                next3.onclick = () => nextStep(4);
            } else {
                next3.classList.add('opacity-60', 'cursor-not-allowed');
                next3.onclick = null;
            }
        }
        [parent_name, parent_email, parent_phone].forEach(el => el.addEventListener('input', validateStep3));

        // validasi step 4

        // --- Ambil kelas berdasarkan jenjang ---
        const jenjangSelect = document.getElementById('jenjangSelect');
        const kelasSelect = document.getElementById('kelasSelect');
        const nominalDisplay = document.getElementById('nominalDisplay');
        const amountPaid = document.getElementById('amount-paid');


        jenjangSelect.addEventListener('change', async () => {
            const jenjangId = jenjangSelect.value;
            kelasSelect.innerHTML = `<option disabled selected>Memuat kelas...</option>`;
            try {
                const res = await fetch(`/api/Classes/${jenjangId}`);
                const data = await res.json();
                kelasSelect.innerHTML = `<option disabled selected>Pilih Kelas</option>`;
                data.forEach(k => {
                    kelasSelect.innerHTML += `<option value="${k.id}">${k.name_class}</option>`;
                });
            } catch (err) {
                kelasSelect.innerHTML = `<option disabled selected>Gagal memuat kelas</option>`;
            }
        });

        // --- Ambil nominal harga berdasarkan kelas dan jenjang ---
        kelasSelect.addEventListener('change', async () => {
            const jenjangId = jenjangSelect.value;
            const kelasId = kelasSelect.value;
            try {
                const res = await fetch(`/api/prices/${jenjangId}/${kelasId}`);
                const data = await res.json();
                nominalDisplay.textContent = `Rp ${data.price.toLocaleString('id-ID').replace(/\./g, ',')}`;
            } catch {
                nominalDisplay.textContent = 'Rp -';
            }
            amountPaid.value = data.price;
        });
    </script>
</body>

</html>

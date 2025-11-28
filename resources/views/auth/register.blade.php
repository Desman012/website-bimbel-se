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
                @if ($errors->any())
                    <div class="mb-4 p-3 border border-red-300 rounded bg-red-50 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed hover:-translate-y-1 transition-transform">Lanjut</button>
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
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed hover:-translate-y-1 transition-transform">Lanjut</button>
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
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold opacity-60 cursor-not-allowed hover:-translate-y-1 transition-transform">Lanjut</button>
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
                                class="px-6 py-2 bg-crimson text-white rounded-lg font-semibold hover:-translate-y-1 transition-transform">Lanjut</button>
                        </div>
                    </div>

                    {{-- STEP 5: JADWAL PERTEMUAN --}}
                    <div class="step hidden" id="step-5">
                        <h3 class="text-xl font-semibold mb-4 text-crimson">5. Jadwal Pertemuan</h3>
                        <p class="text-sm text-gray-500 mb-4">Pilih hari dan waktu pertemuan sesuai kelas yang dipilih.
                        </p>

                        <div id="meetingContainer">
                            <!-- JS akan mengisi hari & waktu dari API day_time -->
                        </div>

                        <div class="flex justify-between mt-6">
                            <button type="button" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300"
                                onclick="prevStep(4)">
                                Kembali
                            </button>
                            <button type="button" id="next5"
                                class="px-4 py-2 rounded bg-crimson text-white opacity-60 cursor-not-allowed hover:-translate-y-1 transition-transform">
                                Lanjut
                            </button>
                        </div>
                    </div>

                    {{-- STEP 6: PEMBAYARAN --}}
                    <div class="step hidden" id="step-6">
                        <h3 class="text-xl font-semibold mb-2 text-crimson">6. Bukti Pembayaran</h3>
                        <p class="text-sm text-gray-500 mb-4">Unggah bukti pembayaran untuk melanjutkan pendaftaran.
                        </p>

                        <div class="mb-4">
                            <p class="text-gray-700 font-semibold">Nominal Pembayaran:</p>
                            <p id="nominalDisplay" class="text-lg font-bold text-crimson">Rp -</p>
                            <input type="hidden" name="amount-paid" id="amountPaid">
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
                            <button type="button" onclick="prevStep(5)"
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

        // ==========================================================
        // SHOW / HIDE PASSWORD
        // ==========================================================
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");

        togglePassword.addEventListener("click", () => {
            const isHidden = passwordField.type === "password";
            passwordField.type = isHidden ? "text" : "password";
            togglePassword.innerHTML = isHidden ?
                '<i class="fa-regular fa-eye-slash"></i>' :
                '<i class="fa-regular fa-eye"></i>';
        });

        // ==========================================================
        // STEP 1 VALIDATION
        // ==========================================================
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const next1 = document.getElementById("next1");

        function validatePasswordComplexity(pass) {
            const minLength = pass.length >= 8;
            const hasUpper = /[A-Z]/.test(pass);
            const hasNumber = /[0-9]/.test(pass);
            const hasSymbol = /[^A-Za-z0-9]/.test(pass);
            return minLength && hasUpper && hasNumber && hasSymbol;
        }

        function validateStep1() {
            const valid = email.validity.valid && validatePasswordComplexity(password.value);
            next1.classList.toggle("opacity-60", !valid);
            next1.classList.toggle("cursor-not-allowed", !valid);
            next1.onclick = valid ? () => nextStep(2) : null;
        }

        email.addEventListener("input", validateStep1);
        password.addEventListener("input", validateStep1);

        // ==========================================================
        // STEP 2 VALIDATION
        // ==========================================================
        const fullName = document.getElementById("full-name");
        const phone = document.getElementById("phone");
        const address = document.getElementById("address");
        const next2 = document.getElementById("next2");

        function validateStep2() {
            const valid = fullName.value.trim() !== "" &&
                phone.value.trim() !== "" &&
                address.value.trim() !== "";
            next2.classList.toggle("opacity-60", !valid);
            next2.classList.toggle("cursor-not-allowed", !valid);
            next2.onclick = valid ? () => nextStep(3) : null;
        }

        [fullName, phone, address].forEach(el => el.addEventListener("input", validateStep2));

        // ==========================================================
        // STEP 3 VALIDATION
        // ==========================================================
        const parentName = document.getElementById("parent-name");
        const parentEmail = document.getElementById("parent-email");
        const parentPhone = document.getElementById("parent-phone");
        const next3 = document.getElementById("next3");

        function validateStep3() {
            const valid = parentName.value.trim() !== "" &&
                parentEmail.validity.valid &&
                parentPhone.value.trim() !== "";
            next3.classList.toggle("opacity-60", !valid);
            next3.classList.toggle("cursor-not-allowed", !valid);
            next3.onclick = valid ? () => nextStep(4) : null;
        }

        [parentName, parentEmail, parentPhone].forEach(el => el.addEventListener("input", validateStep3));

        // ==========================================================
        // STEP 4 VALIDATION & LOAD KELAS
        // ==========================================================
        const program = document.getElementById("programSelect");
        const curriculum = document.getElementById("curriculumSelect");
        const jenjang = document.getElementById("jenjangSelect");
        const kelas = document.getElementById("kelasSelect");
        const next4 = document.querySelector('#step-4 button[onclick="nextStep(5)"]');
        const nominalDisplay = document.getElementById("nominalDisplay");
        const amountPaid = document.getElementById("amountPaid");

        function validateStep4() {
            const valid = program.value !== "" &&
                curriculum.value !== "" &&
                jenjang.value !== "" &&
                kelas.value !== "";
            next4.classList.toggle("opacity-60", !valid);
            next4.classList.toggle("cursor-not-allowed", !valid);
            next4.onclick = valid ? () => nextStep(5) : null;
        }

        [program, curriculum, jenjang, kelas].forEach(el => el.addEventListener("change", validateStep4));
        validateStep4();

        // Load kelas
        jenjang.addEventListener('change', async () => {
            const jenjangId = jenjang.value;
            kelas.innerHTML = `<option disabled selected>Memuat kelas...</option>`;
            try {
                const res = await fetch(`/api/Classes/${jenjangId}`);
                const data = await res.json();
                kelas.innerHTML = `<option disabled selected>Pilih Kelas</option>`;
                data.forEach(k => {
                    kelas.innerHTML += `<option value="${k.id}">${k.name_class}</option>`;
                });
            } catch (err) {
                kelas.innerHTML = `<option disabled selected>Gagal memuat kelas</option>`;
            }
            validateStep4();
        });

        // ==========================================================
        // STEP 5: NOMINAL & JADWAL DINAMIS
        // ==========================================================
        // ==========================================================
        // STEP 5: NOMINAL & JADWAL DINAMIS
        // ==========================================================
        const meetingContainer = document.getElementById("meetingContainer");
        const next5 = document.getElementById("next5");

        kelas.addEventListener("change", async () => {
            const jenjangId = jenjang.value;
            const kelasId = kelas.value;
            if (!kelasId) return;

            // 1. Load nominal
            try {
                const resPrice = await fetch(`/api/prices/${jenjangId}/${kelasId}`);
                const dataPrice = await resPrice.json();

                if (dataPrice && dataPrice.price != null) {
                    // Buang desimal, ambil angka bulat
                    let cleanPrice = Math.floor(Number(dataPrice.price));
                    // Format ribuan
                    let formattedPrice = cleanPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                    nominalDisplay.textContent = `Rp ${formattedPrice}`;
                    amountPaid.value = cleanPrice;
                } else {
                    nominalDisplay.textContent = 'Rp -';
                    amountPaid.value = '';
                }
            } catch (err) {
                console.error(err);
                nominalDisplay.textContent = 'Rp -';
                amountPaid.value = '';
            }


            // 2. Load jadwal
            try {
                const resDayTime = await fetch(`/api/day_time/${kelasId}`);
                const dataDayTime = await resDayTime.json();

                // mapping hari → list times
                const dayMap = {};
                dataDayTime.forEach(dt => {
                    if (!dayMap[dt.day_id]) dayMap[dt.day_id] = {
                        name: dt.day_name,
                        times: []
                    };
                    dayMap[dt.day_id].times.push({
                        time_id: dt.time_id, // pastikan dari DB
                        name_time: dt.name_time,
                        time_in: dt.time_in,
                        time_out: dt.time_out
                    });
                });

                meetingContainer.innerHTML = "";

                Object.keys(dayMap).forEach((dayId, i) => {
                    const div = document.createElement("div");
                    div.classList.add("mb-4", "p-3", "border", "rounded-lg", "bg-gray-50");

                    // LABEL HARI
                    const labelDay = document.createElement("label");
                    labelDay.classList.add("font-semibold");
                    labelDay.textContent = `Hari Pertemuan ${i+1}`;
                    div.appendChild(labelDay);

                    const selectDay = document.createElement("select");
                    selectDay.classList.add("meeting-day", "w-full", "border", "p-2", "mb-2");
                    selectDay.name = "day_id[]";

                    const defaultDay = document.createElement("option");
                    defaultDay.value = "";
                    defaultDay.disabled = true;
                    defaultDay.selected = true;
                    defaultDay.textContent = "Pilih Hari";
                    selectDay.appendChild(defaultDay);

                    // semua hari
                    Object.keys(dayMap).forEach(dId => {
                        const opt = document.createElement("option");
                        opt.value = dId;
                        opt.textContent = dayMap[dId].name;
                        selectDay.appendChild(opt);
                    });
                    div.appendChild(selectDay);

                    // LABEL WAKTU
                    const labelTime = document.createElement("label");
                    labelTime.classList.add("font-semibold");
                    labelTime.textContent = `Waktu Pertemuan ${i+1}`;
                    div.appendChild(labelTime);

                    const selectTime = document.createElement("select");
                    selectTime.classList.add("meeting-time", "w-full", "border", "p-2");
                    selectTime.name = "time_id[]";

                    const defaultTime = document.createElement("option");
                    defaultTime.value = "";
                    defaultTime.disabled = true;
                    defaultTime.selected = true;
                    defaultTime.textContent = "Pilih Waktu";
                    selectTime.appendChild(defaultTime);
                    div.appendChild(selectTime);

                    // ketika hari dipilih → tampilkan semua waktu untuk hari itu
                    selectDay.addEventListener("change", function() {
                        const selectedDay = this.value;
                        selectTime.innerHTML = '';
                        selectTime.appendChild(defaultTime.cloneNode(true));

                        dayMap[selectedDay].times.forEach(t => {
                            const opt = document.createElement("option");
                            opt.value = t.time_id; // kirim ke backend
                            opt.textContent =
                                `${t.name_time} (${t.time_in} - ${t.time_out})`;
                            selectTime.appendChild(opt);
                        });

                        validateStep5();
                    });

                    // event pilih waktu
                    selectTime.addEventListener("change", validateStep5);

                    meetingContainer.appendChild(div);
                });

                validateStep5();

            } catch (err) {
                console.error(err);
                meetingContainer.innerHTML = '<p class="text-red-500">Gagal memuat jadwal</p>';
            }


        });

        // Validasi Step 5
        function validateStep5() {
            const days = document.querySelectorAll(".meeting-day");
            const times = document.querySelectorAll(".meeting-time");
            let valid = true;
            days.forEach(d => {
                if (d.value === "") valid = false;
            });
            times.forEach(t => {
                if (t.value === "") valid = false;
            });
            next5.classList.toggle("opacity-60", !valid);
            next5.classList.toggle("cursor-not-allowed", !valid);
            next5.onclick = valid ? () => nextStep(6) : null;
        }

        // Re-validate ketika ada perubahan
        document.addEventListener("change", e => {
            if (e.target.classList.contains("meeting-day") || e.target.classList.contains("meeting-time"))
                validateStep5();
        });
    </script>
</body>

</html>

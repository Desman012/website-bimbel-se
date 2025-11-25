<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinar Education | Tambun</title>

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Tailwind -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Swiper CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
  
  <!-- CDN Flaticon UIcons -->
<link rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  
  <!-- CDN Flaticon UIcons -->
<link rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
  html { scroll-behavior: smooth; }

  /* Floating Hover Effect */
  .float-hover {
    transition: transform .35s ease, box-shadow .35s ease;
  }
  .float-hover:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
  }

  .active-link {
    color: #f97316 !important;
    font-weight: 700;
}

  /* Slow Fade on Scroll */
  .fade-soft {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeSoft 0.9s ease forwards;
  }
  @keyframes fadeSoft {
    to {
      opacity: 1;
      transform: none;
    }
  }
  .faq-content {
        transition: max-height 0.35s ease;
  }
  
</style>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="font-sans text-gray-800">
  <!-- NAVBAR -->
  <nav 
    x-data="{ open: false }"
    class="bg-white shadow-md fixed top-0 w-full z-50 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    
    <!-- Logo -->
    <div class="flex items-center gap-3">
      <img src="{{ Vite::asset('resources/img/logo.jpg') }}" alt="Logo" class="h-10">
      <h1 class="text-2xl font-bold">
        <span class="text-orange-600">Sinar</span>
        <span class="text-red-600">Education</span>
      </h1>
    </div>


    <!-- Desktop Menu -->
    <ul class="hidden md:flex gap-6 font-medium">
      <li><a href="#home" class="hover:text-orange-600">Beranda</a></li>
      <li><a href="#about" class="hover:text-orange-600">Tentang</a></li>
      <li><a href="#program" class="hover:text-orange-600">Program</a></li>
      <li><a href="#fasilitas" class="hover:text-orange-600">Fasilitas</a></li>
      <li><a href="#review" class="hover:text-orange-600">Testimoni</a></li>
      <li><a href="#faq" class="hover:text-orange-600">FAQ</a></li>
      <li><a href="#contact" class="hover:text-orange-600">Kontak</a></li>
      <li>
        <a href="/login"
           class="px-4 py-2 rounded-lg font-semibold 
                  bg-gradient-to-r from-orange-500 to-red-600 
                  text-white shadow hover:scale-105 transition">
          Masuk
        </a>
      </li>
    </ul>

    <!-- Hamburger -->
    
    <button 
        @click="open = !open"
        class="md:hidden text-3xl focus:outline-none"
    >
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div 
      x-show="open"
      x-transition
      class="md:hidden bg-white shadow-lg py-4 px-6 space-y-4 font-medium"
  >
    <a href="#home" class="block">Beranda</a>
    <a href="#about" class="block">Tentang</a>
    <a href="#program" class="block">Program</a>
    <a href="#fasilitas" class="block">Fasilitas</a>
    <a href="#review" class="block">Testimoni</a>
    <a href="#faq" class="block">FAQ</a>
    <a href="#contact" class="block">Kontak</a>

    <a href="/login"
       class="block text-center px-4 py-2 rounded-lg font-semibold 
              bg-gradient-to-r from-orange-500 to-red-600 
              text-white shadow hover:scale-105 transition">
      Masuk
    </a>
  </div>
</nav>


  <!-- HERO -->
  <section id="home" class="pt-32 bg-gradient-to-r from-orange-400 to-red-500 text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6">
      <div class="flex-1" data-aos="fade-right">
        <h3 class="text-4xl md:text-5xl font-bold leading-tight">
          
          <span class="text-yellow-300">Solusi Belajar untuk SD, SMP, & SMA</span>
        </h3>
        <p class="mt-4 text-lg opacity-90">
          Bimbingan belajar menjadi salah satu kebutuhan penting bagi siswa yang ingin meningkatkan prestasi akademik. Dengan metode belajar yang tepat, siswa bisa lebih mudah memahami pelajaran serta siap menghadapi berbagai ujian sekolah maupun tes masuk perguruan tinggi. Bimbel Sinar Education, yang berlokasi di Tambun Selatan, Kabupaten Bekasi, hadir sebagai solusi terbaik dengan layanan bimbingan belajar berkualitas untuk siswa dari tingkat PAUD hingga SMA serta persiapan UTBK.
        </p>
        <a href="{{route('register')}}"
          class="mt-6 inline-block px-6 py-3 bg-white text-red-600 font-semibold rounded-lg hover:scale-110 hover:shadow-lg transition-all duration-300 animate-pulse">
          Daftar Sekarang
        </a>        
      </div>

      <div class="flex-1 mt-10 md:mt-0 flex justify-center md:justify-end" data-aos="fade-left">
      <img src="{{ Vite::asset('resources/img/foto(beranda).png') }}"
           class="w-full max-w-lg md:max-w-lg"> </div>
  </div>


  </section>

  <!-- ABOUT -->
  <section id="about" class="py-20 bg-gradient-to-br from-orange-50 via-yellow-100 to-orange-100">
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-10">

    <!-- LEFT: GALERI SLIDER -->
    <div class="w-full">
        <div class="swiper mySwiper rounded-xl shadow-lg">
            <div class="swiper-wrapper">
                
                <!-- GANTI DENGAN FOTO GALERIMU -->
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/img/foto1(about).jpeg') }}" class="w-full h-72 object-cover rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/img/foto2(about).jpeg') }}" class="w-full h-72 object-cover rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/img/foto3(about).jpeg') }}" class="w-full h-72 object-cover rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('resources/img/foto4(about).jpeg') }}" class="w-full h-72 object-cover rounded-xl">
                </div>

            </div>

            <!-- TOMBOL PREV & NEXT -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <!-- RIGHT: DESKRIPSI -->
    <div class="max-w-6xl mx-auto px-6 text-center" data-aos="fade-up">
      <h3 class="text-3xl font-bold text-orange-600 mb-4">Tentang Kami</h3>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Bimbel Sinar Education adalah lembaga bimbingan belajar yang telah berdiri lebih dari 5 tahun dan fokus memberikan pendampingan belajar bagi siswa SD, SMP, SMA, hingga persiapan UTBK (SNBT). Dengan motto <strong class="bg-gradient-to-r from-orange-500 to-yellow-500 bg-clip-text text-transparent">
  Your Bright Future Starts Here</strong>, Sinar Education berkomitmen membantu siswa belajar secara lebih terarah, efektif, dan menyenangkan.</p>

      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed"> Didukung oleh 15 mentor berpengalaman di bidangnya, Sinar Education telah berhasil mendampingi banyak siswa mencapai prestasi terbaik di sekolah bahkan hingga lolos ke perguruan tinggi favorit.
      </p>
    </div>

</div>
</section>

  <!-- PROGRAM -->
<section id="program" class="py-20 bg-gradient-to-b from-orange-50 to-white">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h3 class="text-3xl font-bold text-red-600 mb-10" data-aos="zoom-in">Program Unggulan</h3>

    <!-- Ubah grid-cols menjadi 2 kolom -->
    <div class="grid md:grid-cols-2 gap-8">

      <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-orange-500 hover:shadow-xl transition"
           data-aos="flip-left">
        <h4 class="font-semibold text-xl text-orange-600 mb-2">Bimbingan Belajar Kelas</h4>
        <p class="text-gray-600">Program tatap muka dengan mentor berpengalaman untuk semua jenjang pendidikan, mulai dari PAUD, SD, SMP, hingga SMA.</p>
      </div>
      
      <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-orange-500 hover:shadow-xl transition"
           data-aos="flip-left">
        <h4 class="font-semibold text-xl text-orange-600 mb-2">Les Privat</h4>
        <p class="text-gray-600">Layanan privat yang lebih personal dan intensif, di mana mentor dapat datang langsung ke rumah siswa berdasarkan kesepakatan.</p>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-red-500 hover:shadow-xl transition"
           data-aos="flip-up">
        <h4 class="font-semibold text-xl text-red-600 mb-2">Program Persiapan UTBK/SNBT</h4>
        <p class="text-gray-600">Khusus untuk siswa kelas 12 SMA, Sinar Education menghadirkan program bimbingan intensif agar siap menghadapi ujian seleksi masuk perguruan tinggi negeri.</p>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-orange-600 hover:shadow-xl transition"
           data-aos="flip-right">
        <h4 class="font-semibold text-xl text-orange-600 mb-2">Mentoring Tugas dan Konsultasi</h4>
        <p class="text-gray-600">Siswa bisa bertanya langsung kepada mentor terkait tugas atau materi sekolah yang belum dipahami.</p>
      </div>

    </div>
  </div>
</section>


  <!-- FASILITAS (dari template 1 digabung) -->
  <section id="fasilitas" class="py-20 bg-gradient-to-br from-orange-50 via-yellow-100 to-orange-100">
    <h3 class="text-3xl font-bold text-orange-600 text-center mb-10" data-aos="zoom-in">
      Fasilitas Pembelajaran
    </h3>

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
      @foreach ($facilities as $facility)
          <div class="p-6 bg-white shadow-md rounded-xl hover:shadow-xl transition" data-aos="fade-up">
            <h4 class="text-red-600 font-bold text-lg mb-2">"{{$facility->name_facilities}}"</h4>
            <p class="text-gray-600">"{{$facility->description}}"</p>
          </div>
      @endforeach
    </div>
  </section>

  <!-- REVIEW -->
  {{-- <section id="review" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 text-center"> 
    <h3 class="text-3xl font-bold text-orange-600 mb-10" data-aos="zoom-in">
      Apa Kata Mereka?
    </h3>

    <!-- Swiper Container -->
    <div class="swiper myReviewSwiper">
      <div class="swiper-wrapper">

        @foreach ($reviews as $review)
        <div class="swiper-slide">
          <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition h-full">
            <p class="italic text-gray-700">"{{ $review->review_text }}"</p>
            <h5 class="mt-4 font-semibold text-red-500">– {{ $review->name_student }}</h5>
            <h5 class="font-semibold text-yellow-500">{{ $review->school }}</h5>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Navigation -->
      <div class="swiper-button-prev text-orange-600"></div>
      <div class="swiper-button-next text-orange-600"></div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</section> --}}




  {{-- <section id="review" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h3 class="text-3xl font-bold text-orange-600 mb-10" data-aos="zoom-in">
      Apa Kata Mereka?
    </h3>

    <!-- Swiper Container -->
    <div class="swiper myReviewSwiper">
      <div class="swiper-wrapper">

        @foreach ($reviews as $review)
        <div class="swiper-slide">
          <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition h-full" data-aos="fade-right">
            <p class="italic text-gray-700">"{{ $review->review_text }}"</p>
            <h5 class="mt-4 font-semibold text-red-500">– {{ $review->name_student }}</h5>
            <h5 class="font-semibold text-yellow-500">{{ $review->school }}</h5>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Navigation -->
      <div class="swiper-button-prev text-red-600"></div>
      <div class="swiper-button-next text-red-600"></div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section> --}}

  
  <section id="review" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h3 class="text-3xl font-bold text-orange-600 mb-10" data-aos="zoom-in">Apa Kata Mereka?</h3>

      <div class="grid md:grid-cols-3 gap-8">

         @foreach ($reviews as $review)
          <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition" data-aos="fade-right">
            <p class="italic text-gray-700">"{{$review->review_text}}"</p>
            <h5 class="mt-4 font-semibold text-red-500">– {{$review->name_student}}</h5>
            <h5 class="font-semibold text-yellow-500">{{$review->school}}</h5>
          </div>
      @endforeach

      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="py-20 bg-gradient-to-b from-orange-50 to-white">
    <h3 class="text-3xl font-bold text-red-600 text-center mb-10" data-aos="zoom-in">FAQ</h3>
    <h5 class="text-2xl font-bold text-red-600 text-center mb-10" data-aos="zoom-in">(Frequently Asked Questions) </h5>

    <div class="max-w-4xl mx-auto px-6 space-y-6">

        <!-- ITEM FAQ -->
        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-question">
                <h4 class="font-semibold text-orange-600">Berapa biaya pendaftaran?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                Biaya pendaftaran untuk Bimbel dan Privat adalah
                <span class="font-semibold text-red-600">Rp 200.000</span>.
            </p>
        </div>

        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-header">
                <h4 class="font-semibold text-orange-600">Berapa biaya bulanan?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content text-gray-600 mt-2 overflow-hidden max-h-0 transition-all duration-300 leading-relaxed">
                • PAUD – SD : <span class="font-semibold text-red-600">Rp 200.000</span> <br>
                • SMP : <span class="font-semibold text-red-600">Rp 250.000</span> <br>
                • SMA X : <span class="font-semibold text-red-600">Rp 350.000</span> <br>
                • SMA XI – UTBK : <span class="font-semibold text-red-600">Rp 400.000</span>
            </p>
        </div>

        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-header">
                <h4 class="font-semibold text-orange-600">Dimana Lokasi Bimbel Sinar Education?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content text-gray-600 mt-2 overflow-hidden max-h-0 transition-all duration-300">
                Beralamat di <span class="font-semibold text-red-600">Gang Sawo, Jl. Pendidikan, Kp. Siluman, Kab. Bekasi</span>
                (Gang seberang Kantor Desa Mangunjaya).
            </p>
        </div>

        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-header">
                <h4 class="font-semibold text-orange-600">Berapa durasi belajar setiap pertemuan?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content text-gray-600 mt-2 overflow-hidden max-h-0 transition-all duration-300">
                Durasi belajar adalah <span class="font-semibold text-red-600">90 menit</span> per sesi.
            </p>
        </div>

        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-header">
                <h4 class="font-semibold text-orange-600">Apa bedanya Bimbel dan Privat?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content text-gray-600 mt-2 overflow-hidden max-h-0 transition-all duration-300 leading-relaxed">
                <span class="font-semibold text-red-600">Bimbel:</span> belajar di lokasi bimbel, 1 kelas maksimal 15 siswa. <br>
                <span class="font-semibold text-red-600">Privat:</span> mentor datang ke rumah dengan 1–2 siswa sehingga lebih intensif.
            </p>
        </div>

        <div class="faq-item p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer">
            <div class="flex justify-between items-center faq-header">
                <h4 class="font-semibold text-orange-600">Apa perbedaan kelas Reguler dan UTBK?</h4>
                <span class="faq-icon text-orange-600 text-4xl font-extrabold">+</span>


            </div>
            <p class="faq-content text-gray-600 mt-2 overflow-hidden max-h-0 transition-all duration-300 leading-relaxed">
                <span class="font-semibold text-red-600">Kelas Reguler:</span> belajar mengikuti pelajaran sekolah. <br>
                <span class="font-semibold text-red-600">Kelas UTBK:</span> fokus persiapan masuk PTN, baik jalur SNBT maupun Mandiri.
            </p>
        </div>

    </div>
</section>

<script>
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {
        item.addEventListener("click", () => {
            const content = item.querySelector(".faq-content");
            const icon = item.querySelector(".faq-icon");

            faqItems.forEach(other => {
                if (other !== item) {
                    const otherContent = other.querySelector(".faq-content");
                    const otherIcon = other.querySelector(".faq-icon");
                    otherContent.style.maxHeight = null;
                    otherIcon.textContent = "+";
                }
            });

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.textContent = "+";
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.textContent = "-";
            }
        });
    });
</script>




{{-- <section id="faq" class="py-20 bg-white">
    <h3 class="text-3xl font-bold text-red-600 text-center mb-10" data-aos="zoom-in">FAQ</h3>

    <div class="max-w-4xl mx-auto px-6 space-y-6">

      <!-- BIAYA PENDAFTARAN & BULANAN -->
      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Berapa biaya pendaftaran?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block">Biaya pendaftaran untuk Bimbel dan Privat adalah<span class="font-semibold text-red-600">Rp 200.000</span>.
        </p>
      </div>

      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Berapa biaya bulanan?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block leading-relaxed">
          • PAUD – SD : <span class="font-semibold text-red-600">Rp 200.000</span> <br>
          • SMP : <span class="font-semibold text-red-600">Rp 250.000</span> <br>
          • SMA X : <span class="font-semibold text-red-600">Rp 350.000</span> <br>
          • SMA XI – UTBK : <span class="font-semibold text-red-600">Rp 400.000</span>
        </p>
      </div>

      <!-- LOKASI -->
      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Dimana Lokasi Bimbel Sinar Education?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block leading-relaxed">
          Beralamat di <span class="font-semibold text-red-600">Gang Sawo, Jl. Pendidikan, Kp. Siluman, Kab. Bekasi</span>  
          (Gang seberang Kantor Desa Mangunjaya).
        </p>
      </div>

      <!-- DURASI BELAJAR -->
      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Berapa durasi belajar setiap pertemuan?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block leading-relaxed">
          Durasi belajar adalah <span class="font-semibold text-red-600">90 menit</span>  
          per sesi.
        </p>
      </div>
    

      <!-- BEDANYA BIMBEL VS PRIVAT -->
      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Apa bedanya Bimbel dan Privat?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block leading-relaxed">
          <span class="font-semibold text-red-600">Bimbel:</span> belajar di lokasi bimbel, 1 kelas maksimal 15 siswa. <br>
          <span class="font-semibold text-red-600">Privat:</span> mentor datang ke rumah dengan 1–2 siswa sehingga lebih intensif.
        </p>
      </div>

      <!-- BEDANYA REGULER VS UTBK -->
      <div class="p-5 bg-white shadow-md rounded-xl fade-soft cursor-pointer group">
        <h4 class="font-semibold text-orange-600 flex justify-between items-center">
          Apa perbedaan kelas Reguler dan UTBK?
          <span class="transition-transform group-hover:rotate-90">➤</span>
        </h4>
        <p class="text-gray-600 mt-2 hidden group-hover:block leading-relaxed">
          <span class="font-semibold text-red-600">Kelas Reguler:</span> belajar mengikuti pelajaran sekolah. <br>
          <span class="font-semibold text-red-600">Kelas UTBK:</span> fokus persiapan masuk PTN, baik jalur SNBT maupun Mandiri.
        </p>
      </div>
    </div>
</section> --}}

 <!-- CONTACT -->
<section id="contact" class="py-20 bg-gradient-to-r from-red-600 to-orange-500 text-white">
  <div class="max-w-6xl mx-auto px-6" data-aos="zoom-in">

    <!-- Judul + Tagline -->
    <h3 class="text-3xl font-bold text-center mb-2">Hubungi Kami</h3>
    <p class="text-center mb-10 text-orange-100">
      Siap membantu perjalanan belajarmu! Konsultasikan kebutuhan belajar kamu dengan tim kami.
    </p>

    <!-- Layout kiri - kanan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

      <!-- Kiri -->
      <div>
        <h4 class="text-2xl font-bold mb-4">Sinar Education</h4>

        <p class="mb-3">
          <i class="fa-solid fa-location-dot fs-5 px-1"></i>
          <span class="font-bold">Alamat:</span>
          Desa Mangunjaya, Kp. Siluman Tambun Selatan Gang Sawo 1, Jln Pendidikan,  
          Rt 03, Rw18 No.52, Mangunjaya, Kec. Tambun Sel., Kabupaten Bekasi, Jawa Barat 17510
        </p>

        <p class="mb-6">
          <i class="fa-solid fa-phone fs-5 px-1"></i>
          <span class="font-bold">Telepon:</span> 0857-3340-1530
        </p>

        <!-- WA Buttons -->
        <div class="flex flex-col gap-2">
          <a href="https://wa.me/6285714609869"
             target="_blank"
             class="text-white underline underline-offset-2 hover:text-orange-200 transition">
             <i class="fa-brands fa-whatsapp fs-3 px-1"></i>
             +6285714609869 (Admin 1)
          </a>

          <a href="https://wa.me/628567734085"
             target="_blank"
             class="text-white underline underline-offset-2 hover:text-orange-200 transition">
             <i class="fa-brands fa-whatsapp fs-3 px-1"></i>
             +628567734085 (Admin 2)
          </a>
        </div>

        
        
      </div>

      <!-- Kanan: MAP -->
      <div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.167131666072!2d107.0585692!3d-6.241691899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f87b6ff6ba5%3A0x23977bd618a298a0!2sBimbel%20Sinar%20Education!5e0!3m2!1sid!2sid!4v1763548903891!5m2!1sid!2sid"
          width="100%"
          height="350"
          class="rounded-xl shadow-lg"
          allowfullscreen=""
          loading="lazy"
          style="border:0;">
        </iframe>
      </div>

    </div> <!-- End grid -->
  </div>
</section>



  <!-- FOOTER -->
<footer class="bg-red-900 text-white py-8">
  <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">

    <!-- Copyright -->
    <p class="text-center md:text-left">
      &copy; 2025 Sinar Education – Tambun. Semua Hak Dilindungi.
    </p>

    <!-- Social Media Icons -->
    <div class="flex items-center gap-6">

      <!-- Instagram -->
      <i class="fa-brands fa-instagram fs-5 px-1"></i>
      <a href="https://www.instagram.com/sinareducation_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
         target="_blank"
         class="hover:scale-110 transition">
      </a>

      <!-- TikTok -->
      <i class="fa-brands fa-tiktok fs-5 px-1"></i>
      <a href="https://www.tiktok.com/@sinareducation01?is_from_webapp=1&sender_device=pc"
         target="_blank"
         class="hover:scale-110 transition">
      </a>

      <!-- YouTube -->
      <i class="fa-brands fa-youtube fs-5 px-1"></i>
      <a href="https://youtube.com/@sinareducationofficial5005?si=cc9T44ITGwIGjJn_"
         target="_blank"
         class="hover:scale-110 transition">
      </a>

    </div>

  </div>
</footer>


  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper(".mySwiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      grabCursor: true,
      autoplay: {
        delay: 2500,
      },
      // breakpoints: {
      //   640: { slidesPerView: 1 },
      //   768: { slidesPerView: 2 },
      //   1024: { slidesPerView: 3 } // tampil 3 review sekaligus
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll("nav a");

window.addEventListener("scroll", () => {
  let current = "";

  sections.forEach(sec => {
        const top = window.scrollY;
        if(top >= sec.offsetTop - 200){
            current = sec.getAttribute("id");
        }
    });

  navLinks.forEach(a => {
        a.classList.remove("active-link");
        if(a.getAttribute("href") === `#${current}`){
            a.classList.add("active-link");
        }
    });
});
  </script>
</body>
</html>

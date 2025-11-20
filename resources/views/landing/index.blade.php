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
</style>
</head>
<body class="font-sans text-gray-800">

  <!-- NAVBAR -->
  <nav class="bg-white shadow-md fixed top-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex items-center gap-3">
        <img src="{{ Vite::asset('resources/img/logo.jpg') }}" alt="Logo" class="h-10">
        <h1 class="text-2xl font-bold">
          <span class="text-orange-600">Sinar</span>
          <span class="text-red-600">Education</span>
        </h1>
      </div>

     
      <ul class="hidden md:flex gap-6 font-medium">
        <li><a href="#home" class="hover:text-orange-600">Beranda</a></li>
        <li><a href="#about" class="hover:text-orange-600">Tentang</a></li>
        <li><a href="#program" class="hover:text-orange-600">Program</a></li>
        <li><a href="#fasilitas" class="hover:text-orange-600">Fasilitas</a></li>
        <li><a href="#review" class="hover:text-orange-600">Testimoni</a></li>
        <li><a href="#faq" class="hover:text-orange-600">FAQ</a></li>
        <li><a href="#contact" class="hover:text-orange-600">Kontak</a></li>
      </ul>
    </div>
  </nav>

  <!-- HERO -->
  <section id="home" class="pt-32 bg-gradient-to-r from-orange-400 to-red-500 text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6">
      <div class="flex-1" data-aos="fade-right">
        <h3 class="text-4xl md:text-5xl font-bold leading-tight">
          
          <span class="text-yellow-300">Solusi Belajar untuk SD, SMP, SMA</span>
        </h3>
        <p class="mt-4 text-lg opacity-90">
          Bimbingan belajar menjadi salah satu kebutuhan penting bagi siswa yang ingin meningkatkan prestasi akademik. Dengan metode belajar yang tepat, siswa bisa lebih mudah memahami pelajaran serta siap menghadapi berbagai ujian sekolah maupun tes masuk perguruan tinggi. Bimbel Sinar Education, yang berlokasi di Tambun Selatan, Kabupaten Bekasi, hadir sebagai solusi terbaik dengan layanan bimbingan belajar berkualitas untuk siswa dari tingkat PAUD hingga SMA serta persiapan UTBK.
        </p>
        <a href="#contact"
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
  <section id="about" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center" data-aos="fade-up">
      <h3 class="text-3xl font-bold text-orange-600 mb-4">Tentang Kami</h3>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Bimbel Sinar Education adalah lembaga bimbingan belajar yang telah berdiri lebih dari 5 tahun dan fokus memberikan pendampingan belajar bagi siswa SD, SMP, SMA, hingga persiapan UTBK (SNBT). Dengan motto Your Bright Future Starts Here, Sinar Education berkomitmen membantu siswa belajar secara lebih terarah, efektif, dan menyenangkan.

Didukung oleh 15 mentor berpengalaman di bidangnya, Sinar Education telah berhasil mendampingi banyak siswa mencapai prestasi terbaik di sekolah bahkan hingga lolos ke perguruan tinggi favorit.
      </p>
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
  <section id="fasilitas" class="py-20 bg-white">
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
  <!-- FAQ -->
<section id="faq" class="py-20 bg-white">
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
</section>


{{-- <!-- CONTACT -->
<section id="contact" class="py-20 bg-gradient-to-r from-red-600 to-orange-500 text-white">
  <div class="max-w-6xl mx-auto px-6" data-aos="zoom-in">

    <h3 class="text-3xl font-bold text-center mb-10">Hubungi Kami</h3>
    <p class="text-orange-100 leading-relaxed">
          Siap membantu perjalanan belajarmu!  
          Konsultasikan kebutuhan belajar kamu dengan tim kami.
        </p>

    <div class="grid md:grid-cols-2 gap-10 items-center">

      <!-- LEFT: CONTACT INFO -->
      <div class="space-y-4">
        <h4 class="text-2xl font-semibold">Sinar Education</h4>

        <div class="space-y-2 mt-4">
          <p>📍 <strong>Alamat:</strong> Desa Mangunjaya, Kp. Siluman Tambun Selatan Gang Sawo 1, Jln Pendidikan, Rt 03, Rw18 No.52, Mangunjaya, Kec. Tambun Sel., Kabupaten Bekasi, Jawa Barat 17510</p>
          <p>📞 <strong>Telepon:</strong> 0812-3456-7890</p>
        </div>

        <a href="https://wa.me/6281234567890"
            target="_blank"
            class="inline-block mt-6 px-6 py-3 bg-white text-red-600 rounded-lg font-semibold hover:scale-105 transition">
          WhatsApp Kami
        </a>
      </div>

      <!-- RIGHT: GOOGLE MAPS -->
      <div class="w-full h-80 md:h-full">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.167131666072!2d107.0585692!3d-6.241691899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f87b6ff6ba5%3A0x23977bd618a298a0!2sBimbel%20Sinar%20Education!5e0!3m2!1sid!2sid!4v1763548903891!5m2!1sid!2sid"
          class="w-full h-full rounded-lg shadow-lg"
          style="border:0;" allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

    </div>
  </div>
</section>
 --}}

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
          <span class="font-bold">📍 Alamat:</span>
          Desa Mangunjaya, Kp. Siluman Tambun Selatan Gang Sawo 1, Jln Pendidikan,  
          Rt 03, Rw18 No.52, Mangunjaya, Kec. Tambun Sel., Kabupaten Bekasi, Jawa Barat 17510
        </p>

        <p class="mb-6">
          <span class="font-bold">📞 Telepon:</span> 0857-3340-1530
        </p>

        <!-- WA Buttons -->
        <div class="flex flex-col gap-2">
          <a href="https://wa.me/6285714609869"
             target="_blank"
             class="inline-block w-fit px-6 py-3 bg-white text-red-600 rounded-lg font-semibold hover:scale-105 transition">
            Admin 1 (WA)
          </a>

          <a href="https://wa.me/628567734085"
             target="_blank"
             class="inline-block w-fit px-6 py-3 bg-white text-red-600 rounded-lg font-semibold hover:scale-105 transition">
            Admin 2 (WA)
          </a>
        </div>

        <!-- Social Media -->
        <div class="flex items-center gap-6 mt-8 text-white">

          <!-- Instagram -->
          <a href="https://www.instagram.com/sinareducation_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
             target="_blank"
             class="hover:text-orange-200 transition">
            <svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
              <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 
              5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 
              3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 
              1.34-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 
              000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-2a1.5 
              1.5 0 100 3 1.5 1.5 0 000-3z"/>
            </svg>
          </a>

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@sinareducation01?is_from_webapp=1&sender_device=pc"
             target="_blank"
             class="hover:text-orange-200 transition">
            <svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.766 2h3.09c.145 1.26.756 2.432 1.73 
              3.295.92.82 2.146 1.29 3.414 1.33v3.18a7.136 
              7.136 0 01-3.73-1.03v7.58c0 2.39-1.28 4.58-3.36 
              5.74-2.02 1.11-4.52 1.08-6.51-.09a6.613 6.613 
              0 01-3.28-5.71c-.03-2.26 1.11-4.36 3.03-5.54 
              1.27-.78 2.77-1.1 4.24-.93v3.29c-.52-.17-1.09-.14-1.6.1-.86.42-1.4 
              1.29-1.39 2.24 0 1.39 1.12 2.52 2.51 
              2.52a2.52 2.52 0 002.5-2.52V2z"/>
            </svg>
          </a>

          <!-- YouTube -->
          <a href="https://youtube.com/@sinareducationofficial5005?si=cc9T44ITGwIGjJn_"
             target="_blank"
             class="hover:text-orange-200 transition">
            <svg width="36" height="36" fill="currentColor" viewBox="0 0 24 24">
              <path d="M23.5 6.2s-.2-1.7-.8-2.5c-.8-.9-1.6-.9-2-1-2.8-.2-7-.2-7-.2h-.1s-4.2 
              0-7 .2c-.4 0-1.2.1-2 1-.6.8-.8 2.5-.8 2.5S3 
              8.1 3 10v1.9c0 1.9.2 3.8.2 3.8s.2 
              1.7.8 2.5c.8.9 1.9.9 2.4 1 1.8.2 6.8.2 
              6.8.2s4.2 0 7-.2c.4 0 1.2-.1 2-1 
              .6-.8.8-2.5.8-2.5s.2-1.9.2-3.8V10c0-1.9-.2-3.8-.2-3.8zM9.75 
              14.7V8.3l6.25 3.2-6.25 3.2z"/>
            </svg>
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
  <footer class="bg-red-800 text-white py-4 text-center">
    <p>&copy; 2025 Sinar Education – Tambun. Semua Hak Dilindungi.</p>
    <i class="fi fi-brands-instagram"></i>
  </footer>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true });
  </script>

</body>
</html>

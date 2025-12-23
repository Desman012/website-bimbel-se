<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinar Education | Belajar Jadi Menyenangkan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    html { scroll-behavior: smooth; }
  </style>
</head>

<body class="font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed top-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-orange-600">Sinar<span class="text-red-500">Education</span></h1>
      <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
        <li><a href="#home" class="hover:text-orange-600">Beranda</a></li>
        <li><a href="#about" class="hover:text-orange-600">Tentang</a></li>
        <li><a href="#program" class="hover:text-orange-600">Program</a></li>
        <li><a href="#review" class="hover:text-orange-600">Testimoni</a></li>
        <li><a href="#contact" class="hover:text-orange-600">Kontak</a></li>
      </ul>
      <div class="hidden md:block">
        <a href="/login" class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:opacity-90 transition">Masuk</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="pt-32 pb-20 bg-gradient-to-r from-orange-50 to-red-50">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center px-6">
      <div class="flex-1" data-aos="fade-right">
        <h2 class="text-4xl md:text-5xl font-bold text-red-600 leading-tight">
          Belajar Jadi <span class="text-orange-500">Menyenangkan</span> Bersama Kami!
        </h2>
        <p class="mt-4 text-gray-600 text-lg">
          Sinar Education siap membantu siswa dari SD hingga SMA mencapai prestasi terbaik dengan pembelajaran interaktif dan tutor profesional.
        </p>
        <a href="/register" class="mt-6 inline-block px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:opacity-90 transition">
          Daftar Sekarang
        </a>
      </div>
      <div class="flex-1 mt-10 md:mt-0" data-aos="fade-left">
        <img src="https://cdn-icons-png.flaticon.com/512/201/201623.png" alt="Bimbel" class="w-full max-w-md mx-auto">
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center" data-aos="fade-up">
      <h3 class="text-3xl font-bold text-orange-600 mb-4">Tentang Kami</h3>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Sinar Education hadir dengan metode pembelajaran modern yang disesuaikan dengan kebutuhan siswa masa kini. 
        Kami percaya setiap anak memiliki cara belajar unik yang perlu difasilitasi dengan pendekatan yang menyenangkan dan efektif.
      </p>
    </div>
  </section>

  <!-- Program Section -->
  <section id="program" class="py-20 bg-gradient-to-b from-orange-50 to-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h3 class="text-3xl font-bold text-red-600 mb-10" data-aos="zoom-in">Program Belajar</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-orange-500 hover:shadow-xl transition" data-aos="flip-left">
          <h4 class="font-semibold text-xl text-orange-600 mb-2">SD (Sekolah Dasar)</h4>
          <p class="text-gray-600">Membantu siswa memahami pelajaran dasar dan menumbuhkan minat belajar sejak dini dengan cara yang menyenangkan.</p>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-red-500 hover:shadow-xl transition" data-aos="flip-up">
          <h4 class="font-semibold text-xl text-red-600 mb-2">SMP</h4>
          <p class="text-gray-600">Pendalaman materi pelajaran serta bimbingan intensif menghadapi ujian semester dan ujian nasional.</p>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 border-t-4 border-orange-600 hover:shadow-xl transition" data-aos="flip-right">
          <h4 class="font-semibold text-xl text-orange-600 mb-2">SMA</h4>
          <p class="text-gray-600">Kelas persiapan UTBK dan ujian sekolah, lengkap dengan latihan soal dan simulasi ujian.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Review Section -->
  <section id="review" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h3 class="text-3xl font-bold text-orange-600 mb-10" data-aos="zoom-in">Kata Mereka</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition" data-aos="fade-right">
          <p class="italic text-gray-700">"Belajar di Sinar Education bikin aku semangat! Nilai matematikaku naik drastis."</p>
          <h5 class="mt-4 font-semibold text-red-500">– Andi, Siswa SMP</h5>
        </div>
        <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition" data-aos="fade-up">
          <p class="italic text-gray-700">"Anak saya jadi lebih disiplin dan suka belajar. Terima kasih Sinar Education!"</p>
          <h5 class="mt-4 font-semibold text-red-500">– Ibu Lestari, Orang Tua</h5>
        </div>
        <div class="p-6 bg-orange-50 rounded-lg shadow hover:shadow-lg transition" data-aos="fade-left">
          <p class="italic text-gray-700">"Mentor-nya seru dan sabar banget. Suasana belajarnya nggak ngebosenin!"</p>
          <h5 class="mt-4 font-semibold text-red-500">– Dina, Siswa SMA</h5>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-gradient-to-r from-red-600 to-orange-500 text-white">
    <div class="max-w-6xl mx-auto px-6 text-center" data-aos="zoom-in-up">
      <h3 class="text-3xl font-bold mb-4">Hubungi Kami</h3>
      <p class="mb-6 text-orange-100">Kami siap membantu Anda bergabung dan berkembang bersama Sinar Education.</p>
      <p>📍 Jl. Kampung Siluman No. 123, Tambun Selatan</p>
      <p>📞 0812-3456-7890</p>
      <p>✉️ info@sinareducation.com</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-red-800 text-white py-4 text-center">
    <p>&copy; 2025 Sinar Education. Semua Hak Dilindungi.</p>
  </footer>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Today's Attendance</title>
  <script src="https://cdn.tailwindcss.com/3.2.4"></script>
</head>
<body class="bg-gradient-to-b from-amber-100 to-white min-h-screen flex flex-col items-center font-sans text-gray-800 p-4">

  <!-- Header -->
  <div class="w-full max-w-md bg-white rounded-3xl shadow-lg p-5 mt-5">
    <div class="flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="Profile">
        <div>
          <h2 class="font-semibold text-gray-900 text-sm">Astra Jingga</h2>
          <p class="text-xs text-gray-500">SMA</p>
        </div>
      </div>
      <div class="text-sm text-gray-400">11 Nov, 2025</div>
    </div>

    <!-- Working Time -->
    <div class="mt-6 bg-amber-50 rounded-2xl p-5 text-center">
      <h3 class="text-sm font-semibold text-gray-600 mb-3">Attendance Time</h3>
      <!-- JAM REAL-TIME -->
      <div id="clock" class="flex justify-center items-center space-x-2 text-3xl font-bold text-gray-800">
        <span id="hours">--</span><span>:</span><span id="minutes">--</span><span class="text-lg" id="ampm">--</span>
      </div>
      <p class="text-xs text-gray-500 mt-2">Jl. Kampung Siluman No. 123, Tambun Selatan</p>
      <button class="mt-4 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2 px-6 rounded-xl shadow">
        Checkout
      </button>
    </div>

    <!-- Total Attendance -->
    <div class="mt-6">
      <div class="flex items-center justify-between mb-3">
        <h4 class="text-sm font-semibold text-gray-800">Total Attendance (Days)</h4>
        <select class="text-xs border rounded-lg px-2 py-1">
            <option>Jan</option>
          <option>Mar</option>
          <option>Apr</option>
          <option>May</option>
          <option>Jun</option>
          <option>Jul</option>
          <option>Aug</option>
          <option>Sep</option>
          <option>Oct</option>
          <option>Nov</option>
          <option>Des</option>
        </select>
      </div>

      <div class="grid grid-cols-3 gap-3 text-center">
        <div class="bg-green-50 rounded-xl p-3">
          <p class="text-2xl font-bold text-green-600">8</p>
          <p class="text-xs text-gray-600">Present</p>
        </div>
        <div class="bg-yellow-50 rounded-xl p-3">
          <p class="text-2xl font-bold text-yellow-600">2</p>
          <p class="text-xs text-gray-600">Late</p>
        </div>
        <div class="bg-red-50 rounded-xl p-3">
          <p class="text-2xl font-bold text-red-600">1</p>
          <p class="text-xs text-gray-600">Absent</p>
        </div>
      </div>
    </div>

    <!-- Working Hours -->
    <div class="mt-6">
      <div class="flex items-center justify-between mb-3">
        <h4 class="text-sm font-semibold text-gray-800">Today's Schedule</h4>
        <p class="text-xs text-gray-500">19.00 – 21.00 WIB</p>
      </div>

      <div class="space-y-3">
        <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
          <span class="text-sm text-gray-600">Biologi</span>
          <span class="text-sm font-semibold text-gray-900">60 minutes</span>
        </div>
        <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
          <span class="text-sm text-gray-600">Matematika</span>
          <span class="text-sm font-semibold text-gray-900">30 minutes</span>
        </div>
        <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center">
          <span class="text-sm text-gray-600">Fisika</span>
          <span class="text-sm font-semibold text-gray-900">30 minutes</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateClock() {
      const now = new Date();
      let hours = now.getHours();
      let minutes = now.getMinutes();
      const ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12 || 12;
      document.getElementById('hours').textContent = String(hours).padStart(2, '0');
      document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
      document.getElementById('ampm').textContent = ampm;
    }

    updateClock(); // panggil pertama kali
    setInterval(updateClock, 1000); // update tiap detik
  </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sinar Education | Classes</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    @include('admins.layouts.navbar')

    {{-- Sidebar --}}
    @include('admins.layouts.sidebar')


    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 pl-2.5">

                    <div class="col-sm-6">
                        <h1>Kelas</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.dashboard') }}">Kelas</a>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </section>

        <section class="content-header"></section>

        <!-- MAIN CONTENT -->
<section class="content mx-auto p-4">
    <div class="container-fluid">

        <div class="bg-white p-8 rounded-xl shadow">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Pembayaran Siswa</h2>
            </div>

            <!-- TABLE -->
            <table class="min-w-full border rounded-lg">
                <thead class="bg-yellow-100">
                    <tr>
                        <th class="px-4 py-3 text-left">ID Siswa</th>
                        <th class="px-4 py-3 text-left">Bulan</th>
                        <th class="px-4 py-3 text-left">Jumlah</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Bukti</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($payments as $payment)
                    <tr class="border-b hover:bg-yellow-50">

                        <td class="px-4 py-3">
                            {{ $payment->student_id }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $payment->month }}
                        </td>

                        <td class="px-4 py-3">
                            Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-white 
                                @if($payment->status=='pending') bg-yellow-500
                                @elseif($payment->status=='verified') bg-green-600
                                @elseif($payment->status=='rejected') bg-red-600
                                @endif">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <a href="{{ asset('storage/'.$payment->payment_proof) }}" 
                               target="_blank"
                               class="text-blue-600 hover:underline">
                                Lihat Bukti
                            </a>
                        </td>

                        <td class="px-4 py-3">

                            <form action="{{ route('admin.payments.update', $payment->id) }}" 
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <select name="status" 
                                        onchange="this.form.submit()"
                                        class="border rounded px-2 py-1">
                                    <option value="pending"  {{ $payment->status=='pending' ? 'selected':'' }}>Pending</option>
                                    <option value="verified" {{ $payment->status=='verified' ? 'selected':'' }}>Verified</option>
                                    <option value="rejected" {{ $payment->status=='rejected' ? 'selected':'' }}>Rejected</option>
                                </select>

                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            Belum ada data pembayaran.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>

    </div>
</section>


    </div>

</div>

    <!-- jQuery -->
    <script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>


</body>
</html>

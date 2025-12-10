<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title', 'Error')</title>
{{-- DataTable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.min.css" />
{{-- DataTable Bootstrap --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
{{-- CSS Custom --}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- Boxicons --}}
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
{{-- Optional Jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

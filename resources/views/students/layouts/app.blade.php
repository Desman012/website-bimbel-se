<!DOCTYPE html>
<html lang="id">

<head>
    @include('students.layouts.header')
</head>
<body>
    {{-- Sidebar --}}
    @include('students.layouts.sidebar')
    {{-- Main Content --}}
    <section class="home-section">
        <header>
            {{-- navbar --}}
            @include('students.layouts.navbar')
        </header>
        <div class="table-card">
            <h4>@yield('title-content')</h4>
        </div>
        <main class="content-wrapper">
            @yield('content')
        </main>
    </section>
    <script src="https://cdn.datatables.net/2.3.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>

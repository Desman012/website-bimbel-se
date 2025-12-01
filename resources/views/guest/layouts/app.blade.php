<!DOCTYPE html>
<html lang="id">

<head>
    @include('guest.layouts.header')
</head>
<body>
    {{-- Sidebar --}}
    @include('guest.layouts.sidebar')
    {{-- Main Content --}}
    <section class="home-section">
        <header>
            {{-- navbar --}}
            @include('guest.layouts.navbar')
        </header>
        <div class="table-card">
            <h4>@yield('title-content')</h4>
        </div>
        <main class="content-wrapper">
            @yield('content')
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ Vite::asset('resources/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>

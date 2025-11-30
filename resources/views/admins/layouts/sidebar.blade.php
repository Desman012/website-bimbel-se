<div class="sidebar">
    <div class="logo-details">
        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" srcset="">
        <span class="logo_name">Sinar Education</span>
    </div>

    <ul class="nav-links">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.students.registration.index') }}">
                <i class='bx bx-group'></i>
                <span class="link_name">Pendaftar</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('admin.students.registration.index') }}">Pendaftar</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-layer'></i>
                    <span class="link_name">Landing</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <!-- <li><a class="link_name" href="">Landing</a></li> -->
                <li><a href="">Testimoni</a></li>
                <li><a href="">Fasilitas</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a class="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Jadwal</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <!-- <li><a class="link_name" href="">Landing</a></li> -->
                <li><a href="{{ route('admin.levels.index') }}">Jenjang</a></li>
                <li><a href="{{ route('admin.curriculums.index') }}">Kurikulum</a></li>
                <li><a href="{{ route('admin.prices.index') }}">Harga</a></li>
                <li><a href="{{ route('admin.programs.index') }}">Program</a></li>
                <li><a href="{{ route('admin.times.index') }}">Waktu</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.registrations.index') }}">
                <i class='bx bx-user'></i>
                <span class="link_name">Admin</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('admin.registrations.index') }}">Admin</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.students.index') }}">
                <i class='bx bx-group'></i>
                <span class="link_name">Siswa</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('admin.students.index') }}">Siswa</a></li>
            </ul>
        </li>
    </ul>

    <!-- PROFILE DETAIL DIPINDAHKAN KE SINI -->
    <div class="profile-details">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
        
        <div class="profile_name">
            {{ Auth::guard('admin')->user()->full_name }}
        </div>

        <i class='bx bx-log-out'></i>

    </a>
</div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

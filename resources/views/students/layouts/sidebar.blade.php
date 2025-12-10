<div class="sidebar">
    <div class="logo-details">
        <img src="{{ asset('img/logo.png') }}" alt="logo" srcset="">
        <span class="logo_name">Sinar Education</span>
    </div>

    <ul class="nav-links">
        <li>
            <a href="{{ route('students.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('students.dashboard') }}">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                <i class='bx bx-paperclip'></i>
                    <span class="link_name">Absensi</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <!-- <li><a class="link_name" href="">Landing</a></li> -->
                <li><a href="{{ route('students.attendance.index') }}">Absensi</a></li>
                <li><a href="{{ route('students.attendance.history') }}">Riwayat Absensi</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-receipt'></i>
                    <span class="link_name">Bayar</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <!-- <li><a class="link_name" href="">Landing</a></li> -->
                <li><a href="{{ route('students.payment.index') }}">Pembayaran</a></li>
                <li><a href="{{ route('students.payment.history') }}">Riwayat Pembayaran</a></li>
            </ul>
        </li>
    </ul>

    <!-- PROFILE DETAIL DIPINDAHKAN KE SINI -->
    <div class="profile-details">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link">

            <div class="profile_name">
                {{ Auth::guard('student')->user()->full_name }}
            </div>
            <i class='bx bx-log-out'></i>
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

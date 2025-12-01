<div class="sidebar">
    <div class="logo-details">
        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" srcset="">
        <span class="logo_name">Sinar Education</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{ route('guest.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('guest.dashboard') }}">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('guest.profile') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Profile</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('guest.profile') }}">Profilel</a></li>
            </ul>
        </li>
        
    </ul>

    <!-- PROFILE DETAIL DIPINDAHKAN KE SINI -->
    <div class="profile-details">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
        
        <div class="profile_name">
            {{ Auth::guard('guest')->user()->full_name }}
        </div>

        <i class='bx bx-log-out'></i>

    </a>
</div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

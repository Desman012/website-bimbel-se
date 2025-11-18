<!-- Navbar -->
  <nav class="main-header navbar navbar-expand
    bg-[#F9EAB4]">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <div class="user-panel d-flex align-items-center">
              <span class="d-none d-lg-inline text-muted">{{ Auth::user()->name ?? 'Admin' }}</span>
                <div class="image mr-2">
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('adminlte/dist/img/default-user.png') }}" 
                         class="img-circle elevation-1" 
                         alt="User Image"
                         style="width: 30px; height: 30px;">
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ Auth::user()->name ?? 'Admin' }}</span>
            <span class="dropdown-item text-muted text-sm text-center border-bottom mb-2">{{ Auth::user()->email ?? 'admin@example.com' }}</span>

            {{-- <a href="{{ route('profile.show') }}" class="dropdown-item">
                <i class="fas fa-user-circle mr-2"></i> Profil
            </a> --}}
            
            <div class="dropdown-divider"></div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="dropdown-item dropdown-footer text-danger">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
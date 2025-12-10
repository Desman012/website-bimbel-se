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
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
            <div class="user-panel d-flex align-items-center">
              <span class="d-none d-lg-inline text-muted">{{ Auth::guard('student')->user()->full_name ?? 'student' }}</span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ Auth::guard('student')->user()->full_name ?? 'student' }}</span>
            <span class="dropdown-item text-muted text-sm text-center border-bottom mb-2">{{ Auth::user()->email ?? 'admin@example.com' }}</span>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
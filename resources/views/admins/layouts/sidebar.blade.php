  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4
    bg-gradient-to-b 
    from-[#F9EAB4] 
    to-[#F5993D]">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ Vite::asset('resources/img/logo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sinar Education</span>
    </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Landing Page
              </p>
            </a>
          </li>
          <li class="nav-header">MODIFIER</li>
          <li class="nav-item">
            <a href="{{ route('admin.registrations.index') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
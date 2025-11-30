  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 bg-[#F9EAB4]">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
          <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image"
              style="opacity: .8">
          <h1 class="text-2xl font-bold">
              <span class="brand-text text-orange-600">Sinar</span>
              <span class="brand-text text-red-600">Education</span>
          </h1>
      </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                  <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.students.registration.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user-plus"></i>
                      <p>
                          Pendaftaran
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.registrations.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user-shield"></i>
                      <p>
                          Admin
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.students.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user-graduate"></i>
                      <p>
                          Siswa
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                      class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        Logout
                  </a>

<<<<<<< Updated upstream
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
=======
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
            <a href="{{ route('admin.landing') }}">
                <i class='bx bx-layer'></i>
                <span class="link_name">Landing</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ route('admin.landing') }}">Landing</a></li>
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
                <li><a href="{{ route('admin.classes.index') }}">Kelas</a></li>
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
>>>>>>> Stashed changes

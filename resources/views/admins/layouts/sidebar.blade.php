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
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                          Pendaftaran
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.registrations.index') }}" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                          Admin
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.students.index') }}" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                          Siswa
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                      class="nav-link">
                      Logout
                  </a>

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

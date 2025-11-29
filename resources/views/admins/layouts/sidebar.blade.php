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
              <li class="nav-item has-treeview">
                  <a href="{{ route('admin.landing') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Manajemen Landing Page
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
                  <a href="{{ route('admin.payments.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user-graduate"></i>
                      <p>
                          Pembayaran Siswa
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.payments.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-credit-card"></i>
                      <p>
                          Pembayaran
                      </p>
                  </a>
              </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Manajemen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.levels.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.curriculums.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kurikulum</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.classes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.prices.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Harga</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.programs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Program</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.times.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Waktu</p>
                            </a>
                        </li>

                    </ul>
                </li>
              <li class="nav-item">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                      class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
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

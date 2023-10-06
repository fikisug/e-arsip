<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 110%">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-center">
      <a href="{{ asset('assets/index3.html') }}" class="brand-link d-flex">
          {{-- <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">e-Arsip</span>
      </a>
  </div>
  <div class="border-top"></div>
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboardAdmin') }}" class="nav-link @active('dashboardAdmin')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('inputUser.index') }}" class="nav-link @active('inputUser.index')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Management User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('inputKategori.index') }}" class="nav-link @active('inputKategori.index')">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Management Kategori
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('inputFile/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                File Upload
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($allKategori as $k)
              <li class="nav-item">
                <a href="{{ url('/inputFile'.'/'.$k->id) }}" class="nav-link {{ request()->url() == url('/inputFile'.'/'.$k->id) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{$k->nama}}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

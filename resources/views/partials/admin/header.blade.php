  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('ppl-icon.png') }}" alt="logo-ppl" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Inventaris</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                  <li><a href="{{route('admin.asettik')}}" class="dropdown-item">Aset TIK</a></li>
                  <li><a href="{{route('admin.asetrt')}}" class="dropdown-item">Aset Rumah Tangga</a></li>

                  <li class="dropdown-divider"></li>

                  <!-- Level two dropdown-->
                  <li class="dropdown-submenu dropdown-hover">
                      <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Setting</a>
                      <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                          <li><a tabindex="-1" href="{{route('admin.setting_attr_asettik')}}" class="dropdown-item">Atribut Aset TIK</a></li>
                          <li><a href="{{route('admin.setting_attr_asetrt')}}" class="dropdown-item">Atribut Aset Rumah Tangga</a></li>
                          <!-- Level three dropdown-->
                          {{-- <li class="dropdown-submenu">
                              <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                              <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                  <li><a href="#" class="dropdown-item">3rd level</a></li>
                                  <li><a href="#" class="dropdown-item">3rd level</a></li>
                              </ul>
                          </li> --}}
                          <!-- End Level three -->

                      </ul>
                  </li>
                  <!-- End Level two -->
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pemeliharaan</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                  <li><a href="#" class="dropdown-item">Proyek</a></li>
                  <li><a href="#" class="dropdown-item">Tiket</a></li>
                  <li><a href="#" class="dropdown-item">Issue</a></li>
              </ul>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Knowledge Base</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Monitoring</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">User Manajemen</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Laporan</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">System</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
              </a>
              <div class="navbar-search-block">
                  <form class="form-inline">
                      <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                          <div class="input-group-append">
                              <button class="btn btn-navbar" type="submit">
                                  <i class="fas fa-search"></i>
                              </button>
                              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                  <i class="fas fa-times"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </li>

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
          {{-- <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li> --}}

          <li class="nav-item dropdown user user-menu">
              <a href="#" class="nav-link" data-toggle="dropdown">
                  <img src="adminlte/dist/img/user2-160x160.jpg" class="user-image img-size-10 img-circle" alt="User Image">
                  <span class="hidden-xs"><i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      <img src="https://www.gravatar.com/avatar/d109cfe0d6b0e9de42ac8a7eb90d4e04?d=mm&amp;s=128" class="img-circle">
                      <p>
                          superadmin - <small>kiki@ppl.ac.id</small>
                      </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <div class="float-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="float-right">
                          <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign Out</a>
                      </div>
                  </li>
              </ul>
          </li>

      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('ppl-icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Asset Management</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                  <li class="nav-header">Menu</li>
                  <li class="nav-item">
                      <a href="admin" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fa-solid fa-grip"></i>
                          <p>
                              Inventaris
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="./index.html" class="nav-link">
                                  <i class="fa-solid fa-desktop nav-icon"></i>
                                  <p>Aset TIK</p>
                                  <i class="right fas fa-angle-left"></i>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Kelola Aset</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Lisensi</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Credentials</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Attributes</p>
                                          <i class="right fas fa-angle-left"></i>
                                      </a>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Kategori Aset</p>
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Kategori Lisensi</p>
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Status Label</p>
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Pabrikan</p>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="./index2.html" class="nav-link">
                                  <i class="fa-solid fa-home nav-icon"></i>
                                  <p>Aset Rumah Tangga</p>
                                  <i class="right fas fa-angle-left"></i>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Kelola Aset</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                          <i class="fas fa-angles-right nav-icon"></i>
                                          <p>Attributes</p>
                                          <i class="right fas fa-angle-left"></i>
                                      </a>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Kategori Aset</p>
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Status Label</p>
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a href="#" class="nav-link">
                                                  <i class="nav-icon far fa-solid fa-angles-right"></i>
                                                  <p>Pabrikan</p>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="pages/gallery.html" class="nav-link">
                          <i class="nav-icon fa fa-rocket"></i>
                          <p>
                              Projects
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="./index2.html" class="nav-link">
                          <i class="fa-solid fa-ticket nav-icon"></i>
                          <p>Tickets</p>
                          <i class="right fas fa-angle-left"></i>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Menunggu</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>
                                      Aktif
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Semua</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="./index2.html" class="nav-link">
                          <i class="fa-solid fa-tasks nav-icon"></i>
                          <p>Issues</p>
                          <i class="right fas fa-angle-left"></i>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Aktif</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Semua</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="pages/gallery.html" class="nav-link">
                          <i class="nav-icon fa fa-book"></i>
                          <p>
                              Knowledge Base
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="pages/gallery.html" class="nav-link">
                          <i class="nav-icon fa fa-heartbeat"></i>
                          <p>
                              Monitoring
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="pages/gallery.html" class="nav-link">
                          <i class="nav-icon fa fa-bar-chart"></i>
                          <p>
                              Laporan
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="./index2.html" class="nav-link">
                          <i class="fa-solid fa-users nav-icon"></i>
                          <p>User Manajemen</p>
                          <i class="right fas fa-angle-left"></i>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Users</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>
                                      Staff
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Roles</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Kontak</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="./index2.html" class="nav-link">
                          <i class="fa-solid fa-gear nav-icon"></i>
                          <p>System</p>
                          <i class="right fas fa-angle-left"></i>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Predefined Replies</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>API Keys</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Custom Fields</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Import</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Logs</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-angles-right nav-icon"></i>
                                  <p>Settings</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                          <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                          <p>
                              Log out
                          </p>
                      </a>
                  </li>
                  <form action="{{ route('logout') }}" method="POST" class="nav-link" id="logout-form">
                      @csrf
                  </form>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

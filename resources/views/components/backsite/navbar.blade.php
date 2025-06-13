  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <a href="{{ route('admin.index') }}" class="navbar-brand d-lg-none">
            <img src="{{ asset('ppl-icon.png') }}" alt="SAPA PPL Logo" class="brand-image img-circle img-fluid elevation-3" style="opacity: .8; height: 2rem">
            <span class="brand-text font-weight-light">SAPA PPL</span>
          </a>
          {{-- <li class="nav-item dropdown {{ request()->RouteIs('admin.aset*') || request()->is('admin/setting*') ? 'active font-weight-bold' : '' }}">
              <a id="dropdownSubMenuInventaris" href="#inventaris" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-tachometer-alt"></i> Inventaris</a>
              <ul aria-labelledby="dropdownSubMenuInventaris" class="dropdown-menu border-0 shadow" onclick="event.stopPropagation()">
                  <li><x-nav-link href="{{ route('admin.asettik') }}" :active="request()->is('admin/asettik')">Aset TIK</x-nav-link></li>
                  <li><x-nav-link href="{{ route('admin.asetrt') }}" :active="request()->is('admin/asetrt')">Aset Rumah Tangga</x-nav-link></li>
                  <li class="dropdown-divider"></li>
                  <!-- Level two dropdown-->
                  <li class="dropdown-submenu dropdown-hover">
                      <a id="dropdownSubMenuSettingAttribute" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Setting</a>
                      <ul aria-labelledby="dropdownSubMenuSettingAttribute" class="dropdown-menu border-0 shadow" onclick="event.stopPropagation()">
                          <li><a href="{{ route('admin.setting_attr') }}" class="dropdown-item">Atribut Aset</a></li>
                      </ul>
                  </li>
                  <!-- End Level two -->
              </ul>
          </li>
          <li class="nav-item dropdown {{ request()->RouteIs('admin.issues*') ? 'active font-weight-bold' : '' }}">
              <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa-solid fa-screwdriver-wrench"></i>
                  Pemeliharaan</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow" onclick="event.stopPropagation()" style="left: 0px; right: inherit;">
                  <li><x-nav-link href="{{ route('admin.issues') }}" :active="request()->is('admin/issues')">Penugasan</x-nav-link></li>
                  <li class="nav-link disabled"><a href="#" class="dropdown-item">Tiket</a></li>
                  <li class="nav-link disabled"><a href="#" class="dropdown-item">Proyek</a></li>
              </ul>
          </li>
          <li class="nav-item" title="Knowledge Base"><x-nav-link href="#" :active="request()->is('admin/knowledge_base')" class="nav-link"><i class="nav-icon fa fa-book"></i> </x-nav-link></li>
          <li class="nav-item" title="Monitoring"><x-nav-link href="#" :active="request()->is('admin/monitoring')" class="nav-link"><i class="nav-icon fa fa-heartbeat"></i> </x-nav-link></li>
          <li class="nav-item" title="Laporan"><x-nav-link href="#" :active="request()->is('admin/laporan')" class="nav-link"><i class="nav-icon fa fa-bar-chart"></i> </x-nav-link></li>
          <li class="nav-item dropdown">
              <a title="Settings" id="dropdownSubMenuSystem" href="#system" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa-solid fa-gear nav-icon"></i> </a>
              <ul aria-labelledby="dropdownSubMenuSystem" class="dropdown-menu border-0 shadow" onclick="event.stopPropagation()">
                  <li><x-nav-link href="#" :active="request()->is('#')">User</x-nav-link></li>
              </ul>
          </li> --}}
      </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- SEARCH FORM -->
          <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
              </a>
              <div class="navbar-search-block" style="display: none;">
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
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" onclick="event.stopPropagation()">
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
                  <a href="{{ route('admin.notifikasi') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>

          <li class="nav-item dropdown user user-menu">
              <a href="#" class="nav-link" data-toggle="dropdown">
                  <img src="{{ asset('assets/dist/img/user1-128x128.jpg') }}" class="user-image img-size-10 img-circle" alt="User Image">
                  <span class="hidden-xs"><i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu" onclick="event.stopPropagation()">
                  <!-- User image -->
                  <li class="user-header">
                      <img src="{{ asset('assets/dist/img/user1-128x128.jpg') }}" class="img-circle">
                      <p>
                          {{ Auth::user()->name }} - <small>{{ Auth::user()->email }}</small>
                      </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <div class="float-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="float-right">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
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
      <a href="{{ route('admin.index') }}" class="brand-link">
          <img src="{{ asset('ppl-icon.png') }}" alt="SAPA PPL Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SAPA PPL</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-header">MENU</li>
                  <li class="nav-item">
                      <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link {{ request()->is('admin/inventaris*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-warehouse"></i>
                          <p>
                              Inventaris
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.asettik') }}" class="nav-link {{ request()->is('admin/asettik') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-computer"></i>
                                  <p>Aset TIK</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.asetrt') }}" class="nav-link {{ request()->is('admin/asetrt*') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-building"></i>
                                  <p>Aset Rumah Tangga</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.setting_attr') }}" class="nav-link {{ request()->is('admin/setting_attr*') ? 'active' : '' }}">
                                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                                  <i class="nav-icon fa-solid fa-gears"></i>
                                  <p>Setting Atribut</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link {{ request()->is('admin/pemeliharaan*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-screwdriver-wrench"></i>
                          <p>
                              Pemeliharaan
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.issues') }}" class="nav-link {{ request()->is('admin/issues*') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-list-check"></i>
                                  <p>Penugasan</p>
                              </a>
                          </li>
                          <li class="nav-item" data-toggle="tooltip" title="coming soon..." data-placement="top">
                              <a href="#" class="nav-link {{ request()->is('admin/pemeliharaan/tiket') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-ticket"></i>
                                  <p>Tiket</p>
                              </a>
                          </li>
                          <li class="nav-item" data-toggle="tooltip" title="coming soon..." data-placement="top">
                              <a href="#" class="nav-link {{ request()->is('admin/pemeliharaan/proyek') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-thumbtack"></i>
                                  <p>Proyek</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item" data-toggle="tooltip" title="coming soon..." data-placement="top">
                      <a href="#" class="nav-link {{ request()->is('admin/knowledge_base') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-book"></i>
                          <p>Knowledge Base</p>
                      </a>
                  </li>
                  <li class="nav-item" data-toggle="tooltip" title="coming soon..." data-placement="top">
                      <a href="#" class="nav-link {{ request()->is('admin/monitoring') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-heart-pulse"></i>
                          <p>Monitoring</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.laporan')}}" class="nav-link {{ request()->is('admin/laporan') ? 'active' : '' }}">
                          <i class="nav-icon fa fa-bar-chart"></i>
                          <p>Laporan</p>
                      </a>
                  </li>
                  <li class="nav-header">SETTING</li>
                  <li class="nav-item menu">
                      <a href="#" class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-gear"></i>
                          <p>
                              Settings
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.usermanager') }}" class="nav-link {{ request()->is('admin/setting/usermanager') ? 'active' : '' }}">
                                  <i class="nav-icon fa-solid fa-users-gear"></i>
                                  <p>User Management</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav><!-- /.sidebar-menu -->
      </div><!-- /.sidebar -->
  </aside>

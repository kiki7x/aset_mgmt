  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('ppl-icon.png') }}" alt="logo-ppl" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark">
      <div class="container">
          <a href="{{ route('admin.index') }}" class="navbar-brand">
              <img src="{{ asset('ppl-icon.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-medium">Aset MGMT PPL</span>
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item dropdown {{ request()->RouteIs('admin.aset*') || request()->is('admin/setting*') ? 'active' : '' }}">
                      <a id="dropdownSubMenuInventaris" href="#inventaris" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-tachometer-alt"></i> Inventaris</a>
                      <ul aria-labelledby="dropdownSubMenuInventaris" class="dropdown-menu border-0 shadow">
                          {{-- <li><a href="{{ route('admin.asettik') }}" class="dropdown-item {{request()->is('admin/asettik') ? 'active' : ''}}">Aset TIK</a></li> --}}
                          <li><x-nav-link href="{{ route('admin.asettik') }}" :active="request()->is('admin/asettik')">Aset TIK</x-nav-link></li>
                          <li><x-nav-link href="{{ route('admin.asetrt') }}" :active="request()->is('admin/asetrt')">Aset Rumah Tangga</x-nav-link></li>
                          <li class="dropdown-divider"></li>
                          <!-- Level two dropdown-->
                          <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenuSettingAttribute" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Setting</a>
                              <ul aria-labelledby="dropdownSubMenuSettingAttribute" class="dropdown-menu border-0 shadow">
                                  <li><a href="{{ route('admin.setting_attr_asettik') }}" class="dropdown-item">Atribut Aset TIK</a></li>
                                  <li><a href="{{ route('admin.setting_attr_asetrt') }}" class="dropdown-item">Atribut Aset Rumah Tangga</a></li>
                              </ul>
                          </li>
                          <!-- End Level two -->
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa-solid fa-screwdriver-wrench"></i>
                          Pemeliharaan</a>
                      <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                          <li><a href="#" class="dropdown-item">Proyek</a></li>
                          <li><a href="#" class="dropdown-item">Tiket</a></li>
                          <li><a href="#" class="dropdown-item">Issue</a></li>
                      </ul>
                  </li>
                  <li class="nav-item" title="Knowledge Base"><x-nav-link href="#" :active="request()->is('admin/knowledge_base')" class="nav-link"><i class="nav-icon fa fa-book"></i> </x-nav-link></li> {{--knowledge base--}}
                  <li class="nav-item" title="Monitoring"><x-nav-link href="#" :active="request()->is('admin/monitoring')" class="nav-link"><i class="nav-icon fa fa-heartbeat"></i> </x-nav-link></li> {{--Monitoring--}}
                  <li class="nav-item" title="Laporan"><x-nav-link href="#" :active="request()->is('admin/laporan')" class="nav-link"><i class="nav-icon fa fa-bar-chart"></i> </x-nav-link></li> {{--Laporan--}}
                  <li class="nav-item dropdown">
                      <a title="Settings" id="dropdownSubMenuSystem" href="#system" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa-solid fa-gear nav-icon"></i> </a>
                      <ul aria-labelledby="dropdownSubMenuSystem" class="dropdown-menu border-0 shadow">
                          <li><x-nav-link href="#" :active="request()->is('#')">User</x-nav-link></li>
                      </ul>
                  </li>
              </ul>
          </div>

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
                      <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image img-size-10 img-circle" alt="User Image">
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
      </div>
  </nav>
  <!-- /.navbar -->

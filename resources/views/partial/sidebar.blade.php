<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>KADUNG</b>-LAYAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session('nama')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-header">MENU UTAMA</li>
            @if (Session::get("role") == "User")

            {{-- MENU DASHBOARD --}}
            <li class="nav-item">
                <a href="{{url('/')}}" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                    Beranda
                    <span class="right badge badge-danger">Realtime</span>
                </p>
                </a>
            </li>

            <li class="nav-item">
              <a href="{{url('regis_armada')}}" class="nav-link">
              <i class="fa fa-truck nav-icon"></i>
              <p>Armada</p>
              </a>
            </li>

            @endif

            {{-- LOGOUT --}}
            <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link" onclick="return confirm('apakah yakin akan logout ?')">
                <i class="nav-icon fa fa-door-open"></i>
                <p>
                    Logout
                </p>
                </a>
            </li>

            @if (Session::get("role") == "Admin")

            <li class="nav-header mt-3">ADMINISTRATOR</li>

            {{-- MENU TPA --}}
            
            <li class="nav-item">
              <a href="{{url('pengguna')}}" class="nav-link">
              <i class="fa fa-users nav-icon"></i>
              <p>Pengguna</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('truk')}}" class="nav-link">
              <i class="fa fa-clipboard-list nav-icon"></i>
              <p>Validasi Armada</p>
              </a>
            </li>
  
            <li class="nav-item">
              <a href="{{url('scan')}}" class="nav-link" target="_blank">
              <i class="fa fa-barcode nav-icon"></i>
              <p>Scan Pintu Masuk</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('laporan')}}" class="nav-link">
              <i class="fa fa-newspaper nav-icon"></i>
              <p>Laporan</p>
              </a>
            </li>

            @endif
               
        </ul>
      </nav>
    </div>
  </aside>
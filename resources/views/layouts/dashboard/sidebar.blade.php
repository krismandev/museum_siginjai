@php
    use App\Jenis;
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('asset_dashboard/dist/img/AdminLTELogo.png')}}" alt="LOGO" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Museum Siginjei</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset_dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{route('admin.dashboard.index')}}" class="nav-link {{(request()->is('dashboard'))?'active': ''}}">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                  Dashboard
                  </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.jenis.index')}}" class="nav-link {{(request()->is('dashboard/jenis*'))?'active': ''}}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>
                  Jenis
                  </p>
              </a>
            </li>
            @php
              $koleksi_menu_active = (request()->is('dashboard/koleksi*')) ? true : false;
              $jenises = Jenis::orderBy("no_jenis","asc")->get();
            @endphp
            <li class="nav-item has-treeview {{$koleksi_menu_active == true ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{$koleksi_menu_active == true ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Koleksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.koleksi.index')}}" class="nav-link {{(request()->is('dashboard/koleksi'))?'active': ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semua Koleksi</p>
                  </a>
                </li>
                {{-- @foreach ($jenises as $jenis)
                <li class="nav-item">
                  <a href="{{route('admin.koleksi-perjenis.index',$jenis->no_jenis)}}" class="nav-link {{(request()->is('dashboard/koleksi/jenis/'.$jenis->no_jenis))?'active': ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{$jenis->nama_jenis}}</p>
                  </a>
                </li>
                @endforeach --}}
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.berita.index')}}" class="nav-link {{(request()->is('dashboard/berita*'))?'active': ''}}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>
                  Berita
                  </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.slider.index')}}" class="nav-link {{(request()->is('dashboard/slider*'))?'active': ''}}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>
                  Slider
                  </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.event.index')}}" class="nav-link {{(request()->is('dashboard/event*'))?'active': ''}}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>
                    Event
                  </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{route('admin.koleksi.index')}}" class="nav-link {{(request()->is('dashboard/koleksi*'))?'active': ''}}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>
                  Koleksi
                  </p>
              </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fa fa-sign-out"></i>
                <p>
                    Logout
                </p>
                </a>
            </li>
          @php
              $tentang_menu_active = (request()->is('dashboard/tentang*')) ? true : false;
          @endphp
          <li class="nav-item has-treeview {{$tentang_menu_active == true ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{$tentang_menu_active == true ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tentang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.tentang.profil.index')}}" class="nav-link {{(request()->is('dashboard/tentang/profil'))?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tentang.sejarah.index')}}" class="nav-link {{(request()->is('dashboard/tentang/sejarah'))?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sejarah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tentang.visimisi.index')}}" class="nav-link {{(request()->is('dashboard/tentang/visimisi'))?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tentang.struktur.index')}}" class="nav-link {{(request()->is('dashboard/tentang/struktur'))?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Struktur Organisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tentang.tugas.index')}}" class="nav-link {{(request()->is('dashboard/tentang/tugas'))?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas dan Fungsi</p>
                </a>
              </li>
            </ul>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
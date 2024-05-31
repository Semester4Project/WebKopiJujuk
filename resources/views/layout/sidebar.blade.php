    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon">
            <img src="{{asset('img/kojuk.png')}}">
          </div>
          <div class="sidebar-brand-text mx-3">KopiJujuk</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Pesanan</span>
          </a>
          <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Pesanan</h6>
              <a class="collapse-item" href="{{route('PesananBaru')}}">Pesanan Baru</a>
              <a class="collapse-item" href="{{route('pesanansiapdikirim')}}">Pesanan Siap Dikirim</a>
              <a class="collapse-item" href="{{route('Pesanandikirim')}}">Pesanan Dikirim</a>
              <a class="collapse-item" href="{{route('Pesananselesai')}}">Pesanan Selesai</a>
            </div>
          </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('listproduct')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('viewlaporan')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Laporan</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('admin.profile')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span></a>
        </li>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="nav-item active">
          @csrf
          <a class="nav-link" href="#" onclick="confirmLogout(event);">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </form>
      </ul>
      <!-- Sidebar -->
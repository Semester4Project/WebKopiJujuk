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
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pesanan</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Laporan</span></a>
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
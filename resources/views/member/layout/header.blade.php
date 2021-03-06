<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/member" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('member.show', auth()->user()->uuid) }}" class="nav-link">Profil</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('landingpage.index') }}" class="nav-link">Situs</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('auth.logout') }}" class="nav-link">Keluar</a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

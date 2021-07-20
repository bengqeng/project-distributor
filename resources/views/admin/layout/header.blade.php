<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('index.admin') }}" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href=" {{ route('profile.index') }} " class="nav-link">Profil</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('landingpage.index') }}" class="nav-link">Situs</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if ($notification['total_notification'] > 0)
                    <span class="badge badge-warning navbar-badge">{{ $notification['total_notification']}}</span>
                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">{{ $notification['total_notification']}} Notifications</span>

                @if ($notification['new_register'] > 0)
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.users.approval') }}" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> {{ $notification['new_register']}} Pending Member Baru
                    </a>
                @endif

            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  data-slide="true" href="{{ route('auth.logout') }}" role="button">
            Keluar
            </a>
        </li>
    </ul>

</nav>
  <!-- /.navbar -->

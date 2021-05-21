<title> @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link href="{{ asset('css/app.css') }}"  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Admin 3L</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Reza Velayani</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
              <a href="webContent.html" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Web Content
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Users
                  <i class="fas fa-angle-left right"></i>
                </p>
                <span class="badge badge-info right">New 3</span>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="allUser.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All</p>
                    <span class="badge badge-info right">3</span>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="approval.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aproval</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="deletedUser.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Deleted</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="uploadImage.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Upload Image
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="graphic.html" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Graphic
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
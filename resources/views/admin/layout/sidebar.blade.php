<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link">
    <img src="/vendor/img/admin/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Logo Brand</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/vendor/img/admin/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
       Alexander Pierce
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
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Web Content
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.carousel') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Carousel</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.webcontent.product') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.webcontent.about_us') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.webcontent.social_media') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Media</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.article') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Article</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.all') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.approval') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                @if ($notification['new_register'] > 0)
                    <span class="badge badge-info right">{{ $notification['new_register'] }}</span>
                @endif
                <p>Aproval</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.deleted') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejected</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.upload') }}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Upload Image
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/graphic" class="nav-link">
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

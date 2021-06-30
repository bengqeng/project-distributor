<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index.admin') }}" class="brand-link">
        <img src="{{ asset('vendor/img/main/logo-grey.png') }}" alt="{{ env('APP_NAME')." logo" }}" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" {{ auth()->user()->gender ==  "laki-laki" ? url('vendor/img/avatar/avatar_male.png') : url('vendor/img/avatar/avatar_woman.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{ auth()->user()->full_name }}</br>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
                        <p>
                        Product
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('product-category.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Category</p>
                        </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Content</p>
                        </a>
                        </li>
                    </ul>
                </li>
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
                        <a href="{{ route('about.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tentang Kami</p>
                        </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('social.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sosial Media</p>
                        </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('admin.article') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('admin.users.aktif') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Aktif</p>
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
                        <a href="{{ route('admin.users.rejected') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rejected</p>
                        </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('admin.users.banned') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Banned</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.upload') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                        Unggah Gambar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.graphic.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                        Grafis
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.report.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-tasks" aria-hidden="true"></i>
                    <p>
                        Laporan
                    </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

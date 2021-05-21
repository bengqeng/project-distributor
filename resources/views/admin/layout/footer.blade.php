<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition light sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Profile</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

      </ul>
    </nav>
    <!-- /.navbar -->

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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-boxes"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Inventory</span>
                  <span class="info-box-number">
                    5,200
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->


            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Members</span>
                  <span class="info-box-number">2,000</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Deleted</span>
                  <span class="info-box-number">410</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Member in Regional</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                        class="fas fa-expand"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="container">
                    <div class="row">
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Kalimantan</span>
                            <span class="info-box-number">921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Kendari</span>
                            <span class="info-box-number">3,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Yogyakarta</span>
                            <span class="info-box-number">63,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Lampung</span>
                            <span class="info-box-number">1,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Padang</span>
                            <span class="info-box-number">14,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Solo</span>
                            <span class="info-box-number">3,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Lombok</span>
                            <span class="info-box-number">63,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <div class="col-3">
                        <div class="info-box mb-3 bg-info">
                          <div class="info-box-content">
                            <span class="info-box-text">Kuningan</span>
                            <span class="info-box-number">1,921</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->

                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List Member</h3>
                  <div class="card-tools">

                    <!-- Maximize Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                        class="fas fa-expand"></i></button>

                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="p-0">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">
                            #
                          </th>
                          <th style="width: 40%">
                            Full Name
                          </th>
                          <th style="width: 15%">
                            Account Type
                          </th>
                          <th style="width: 15%">
                            Area
                          </th>
                          <th>
                            Account Id
                          </th>
                          <th style="width: 8%" class="text-center">
                            Status User
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            #
                          </td>
                          <td>
                            <a>
                              Rafael
                            </a>
                            <br>
                            <small>
                              Created 01.01.2019
                            </small>
                          </td>
                          <td>
                            Agent
                          </td>
                          <td class="project_progress">
                            Jakarta
                          </td>
                          <td>
                            jak001a
                          </td>
                          <td class="project-state">
                            <span class="badge badge-success">Active</span>
                          </td>

                        </tr>
                        <tr>
                          <td>
                            #
                          </td>
                          <td>
                            <a>
                              Iron Man
                            </a>
                            <br>
                            <small>
                              Created 01.01.2019
                            </small>
                          </td>
                          <td>
                            Agent
                          </td>
                          <td class="project_progress">
                            Jakarta
                          </td>
                          <td>
                            jak001a
                          </td>
                          <td class="project-state">
                            <span class="badge badge-success">Active</span>
                          </td>

                        </tr>
                        <tr>
                          <td>
                            #
                          </td>
                          <td>
                            <a>
                              Superman
                            </a>
                            <br>
                            <small>
                              Created 01.01.2019
                            </small>
                          </td>
                          <td>
                            Agent
                          </td>
                          <td class="project_progress">
                            Jakarta
                          </td>
                          <td>
                            jak001a
                          </td>
                          <td class="project-state">
                            <span class="badge badge-danger">Banned</span>
                          </td>

                        </tr>
                        <tr>
                          <td>
                            #
                          </td>
                          <td>
                            <a>
                              Thor
                            </a>
                            <br>
                            <small>
                              Created 01.01.2019
                            </small>
                          </td>
                          <td>
                            Agent
                          </td>
                          <td class="project_progress">
                            Jakarta
                          </td>
                          <td>
                            jak001a
                          </td>
                          <td class="project-state">
                            <span class="badge badge-success">Active</span>
                          </td>

                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Activity User</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Account Type</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td>Admin</td>
                        <td>User</td>
                      </tr>
                      <tr class="expandable-body">
                        <td colspan="5">
                          <p>
                            Add <b>Superman</b> as agent to user
                          </p>
                        </td>
                      </tr>
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td>Admin</td>
                        <td>Product</td>
                      </tr>
                      <tr class="expandable-body">
                        <td colspan="5">
                          <p>
                            Add new <b>Product xyz</b> to inventory
                          </p>
                        </td>
                      </tr>
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>657</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td>Admin</td>
                        <td>User</td>
                      </tr>
                      <tr class="expandable-body">
                        <td colspan="5">
                          <p>
                            Banned <b>Iron Mas</b> from user
                          </p>
                        </td>
                      </tr>
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td>Member</td>
                        <td>Product</td>
                      </tr>
                      <tr class="expandable-body">
                        <td colspan="5">
                          <p>
                            Purchase <b>Prodcut xyz</b>
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Inventory</span>
                  <span class="info-box-number">5,200</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">New Member</span>
                  <span class="info-box-number">650</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->



              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>
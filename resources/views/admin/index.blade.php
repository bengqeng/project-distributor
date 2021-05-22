@extends('admin.admin')
@section('title', 'Dasboard')
@section('main-content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dasboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Dasboard</li>
            </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

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


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection

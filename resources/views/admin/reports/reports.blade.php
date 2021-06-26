@extends('admin.master_admin')
@section('title', 'Report')
@section('main-content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Reports</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
        <div class="card">

            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Users</a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <table class="table table-hover" id="table-users-report">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Akun</th>
                                    <th>Jenis Agent</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $user->username }} </td>
                                    <td>{{ $user->account_type }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->nama_provinsi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- /.tab-pane -->
                </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@section('js-script')
    <script>
        $(document).ready(function () {
            buildReports();
        });

        function buildReports(){
            if ($('#table-users-report').length && $('#table-users-report').is(':visible')) {
                window.updateUserReportTable();
            }
        }
    </script>
@endsection

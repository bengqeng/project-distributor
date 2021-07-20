@extends('admin.master_admin')
@section('title', 'Laporan')
@section('main-content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Anggota</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-inline" method="GET" action="{{ route('admin.report.index') }}">
                                @csrf

                                <div class="form-group mb-2">
                                    <label class="sr-only">Nama Lengkap</label>
                                    <input name="full_name" type="full_name" class="form-control" placeholder="Nama" value="{{ $fullName }}">
                                </div>

                                <div class="form-group mx-sm-1 mb-2">
                                    <select class="form-control" name="account_type">
                                        <option value="">-- Tipe Akun --</option>
                                        <option value="agent" {{ $accountType == 'agent' ? "selected" : "" }}>Agent</option>
                                        <option value="distributor" {{ $accountType == 'distributor' ? "selected" : "" }}>Distributor</option>
                                    </select>
                                </div>

                                <select class="form-control mx-sm-1 mb-2" id="region_users" name="kode_area">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi['id_prov'] }}" {{ $provinsi['id_prov'] == $kode_area ? "selected": ""}}> {{ $provinsi['nama'] }} </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary mb-2">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Cari
                                </button>
                            </form>
                        </div>

                        <div class="col-md-2">
                            <div class="row float-right">
                                <button class="btn btn-success" id="report-excel-users">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Export
                                </button>
                            </div>
                        </div>
                    </div>

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
                                            <td>{{ $loop->iteration }}</td>
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

                        <div class="card-footer clearfix">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-left">Total :
                                        {{ $users->total() }}
                                    </p>
                                </div>
                                <div class="col-sm-6 float-right">
                                    {{ $users->links('pagination::admin_users_setting') }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-script')
    <script>
        $(document).ready(function () {
            buildReports();
        });

        $('button#report-excel-users').on('click', function(e){
            $('button.datatable-export-to-excel-report').trigger('click');
        });

        function buildReports(){
            if ($('#table-users-report').length && $('#table-users-report').is(':visible')) {
                window.updateUserReportTable();
            }
        }
    </script>
@endsection

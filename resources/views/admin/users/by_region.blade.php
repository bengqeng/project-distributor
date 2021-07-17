@extends('admin.master_admin')
@section('title', 'Users Berdasarkan Region')

@section('main-content')
  <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-6">
            <h1 class="m-0">Semua Berdasarkan Provinsi</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
            <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>

        </div>
    </div>
</div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Member</h3>
                    </div>

                    <div class="card-body">
                        <form class="form-inline" method="GET" action="{{ route('admin.users_by_region') }}">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="sr-only">Full Name</label>
                                <input name="full_name" type="full_name" class="form-control" placeholder="Nama" value="{{ $fullName }}">
                            </div>

                            <div class="form-group mx-sm-1 mb-2">
                                <select class="form-control" name="account_type">
                                    <option value="">-- Account Type --</option>
                                    <option value="agent" {{ $accountType == 'agent' ? "selected" : "" }}>Agent</option>
                                    <option value="distributor" {{ $accountType == 'distributor' ? "selected" : "" }}>Distributor</option>
                                </select>
                            </div>

                            <div class="form-group mx-sm-1 mb-2">
                                <select class="form-control" name="status_register">
                                    <option value="">-- Status --</option>
                                    <option value="approved" {{ $statusRegister == 'approved' ? "selected" : "" }}>Approved</option>
                                    <option value="rejected" {{ $statusRegister == 'rejected' ? "selected" : "" }}>Rejected</option>
                                    <option value="hold" {{ $statusRegister == 'hold' ? "selected" : "" }}>Hold</option>
                                </select>
                            </div>

                            <select class="form-control mx-sm-1 mb-2" id="region_users" name="kode_area" required>
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

                        <div class="row">
                            <div class="col-2">
                                <div class="info-box mb-3 bg-danger">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Rejected</span>
                                        <span class="info-box-number">{{ $rejected }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="info-box mb-3 bg-warning">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending</span>
                                        <span class="info-box-number">{{ $pending }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="info-box mb-3 bg-success">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Agent</span>
                                        <span class="info-box-number">{{ $agent }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="info-box mb-3 bg-success">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Distributor</span>
                                        <span class="info-box-number">{{ $distributor }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="info-box mb-3 bg-info">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total User Aktif</span>
                                        <span class="info-box-number">{{ $total }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover" id="table-users-region">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Full Name</th>
                                    <th>Account Type</th>
                                    <th>Area</th>
                                    <th>Account Id</th>
                                    <th>Status User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($members))
                                    @foreach ($members as $member)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> <a href="{{ route('admin.users.aktif.detail', $member->uuid) }}">{{ $member->full_name }}</a></td>
                                            <td> {{ $member->account_type }}</td>
                                            <td> {{ $member->nama_provinsi }}</td>
                                            <td> {{ $member->username }}</td>
                                            <td> {{ $member->status_register }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Data Kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-left">Total :
                                    @if (!empty($members))
                                        {{ $members->total() }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-sm-6 float-right">
                                @if (!empty($members))
                                    {{ $members->links('pagination::admin_users_setting') }}
                                @endif
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
@endsection

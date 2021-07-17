@extends('admin.master_admin')
@section('title', 'Deleted User')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rejected</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Deleted</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Rejected User</h3>
                    </div>

                    <div class="card-body">

                        <form class="form-inline" method="GET" action="{{ route('admin.users.rejected') }}">
                            @csrf
                            <div class="form-group mx-sm-1 mb-2">
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
                            <div class="form-group mx-sm-3 mb-2">
                                <select class="form-control" name="kode_area">
                                    <option value="">-- Area --</option>
                                    @if (count($provinsis) > 0)
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi['id_prov'] }}" {{ $provinsi['id_prov'] == $kodeArea ? 'selected' : '' }}> {{ $provinsi['nama'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Cari
                            </button>
                        </form>

                        <table class="table table-bordered" id="table-users-rejected">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Full Name</th>
                                    <th>Account Type</th>
                                    <th>Area</th>
                                    <th>Account Id</th>
                                    <th>Status User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td><a href="{{ route('admin.users.rejected.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                            <td>{{ $user->account_type }}</td>
                                            <td>{{ $user->nama_provinsi }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->status_register }}</td>
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
                                <p class="text-left">Total : {{ $users->total() }}</p>
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
@endsection

@section('js-script')
@endsection

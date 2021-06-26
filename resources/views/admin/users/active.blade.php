@extends('admin.master_admin')
@section('title', 'Users')

@section('main-content')
  <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
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
                    <h3 class="card-title">List Aktif User</h3>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="table-users-all">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Full Name</th>
                                    <th>Account Type</th>
                                    <th>Area</th>
                                    <th>Account Id</th>
                                    <th>Status User</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{ route('admin.users.aktif.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                <td>{{ $user->account_type }}</td>
                                <td>{{ $user->nama_provinsi }}</td>
                                <td>{{ $user->username  }}</td>
                                <td>{{ $user->status_register }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-sm" title="Ban User" id="btn-submit" value="Ban User" onclick="confirmBanUser(this)"> Ban User</button>
                                    <form action="{{ route('admin.users.aktif.ban', $user->uuid) }}" method="POST" id="form-ban-user" class="sr-only">
                                        @csrf
                                        <input type="hidden" name="confirmation" value="yes">
                                        <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $users->links('pagination::simple-bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js-script')
    <script>
        function confirmBanUser(obj){
            Swal.fire({
                title: 'Apakah anda ingin melakukan ban terhadap akun user tersebut?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(obj).parent('td').find('form').submit();
                    }
            });
        };
    </script>
@endsection

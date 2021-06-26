@extends('admin.master_admin')
@section('title', 'Deleted User')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Banned</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Banned</li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Banned User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="table-users-all">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Full Name</th>
                                    <th>Account Type</th>
                                    <th>Area</th>
                                    <th>Akun</th>
                                    <th>Status User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><a href="{{ route('admin.users.rejected.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                    <td>{{ $user->account_type }}</td>
                                    <td>{{ $user->nama_provinsi }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->status_register }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.open_banned', $user->uuid) }}" method="POST" id="form-open-ban-user">
                                        @csrf
                                        <input type="hidden" name="confirmation" value="yes">
                                        <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                                        <input type="submit" class="btn btn-warning btn-sm" title="Ban User" id="btn-submit-open-ban" value="Open Ban User">
                                        </input>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $users->links('pagination::simple-bootstrap-4') }}
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('js-script')
  <script>
    $('#btn-submit-open-ban').on('click', function(e) {
        e.preventDefault();
        var form = $('form#form-open-ban-user');

        Swal.fire({
            title: 'Apakah anda ingin membuka ban terhadap akun user tersebut?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Ya`,
            denyButtonText: `Tidak`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
  </script>
@endsection

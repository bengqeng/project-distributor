@extends('admin.master_admin')
@section('title', 'Approval User')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Approval</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Approval</li>
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
                        <h3 class="card-title">List Pending User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered" id="table-users-all">
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

                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row"> {{ $loop->iteration }} </th>
                                            <td><a href="{{ route('admin.users.approval.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                            <td> {{ $user->account_type }}</td>
                                            <td> {{ $user->nama_provinsi}} </td>
                                            <td> {{ $user->username }} </td>
                                            <td> {{ $user->status_register }} </td>
                                            <td class="text-center">
                                                <button onclick="confirmapproveApproval('{{ $user->uuid }}')" class="btn btn-success btn-sm" title="Approve">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Approve</button>
                                                <button onclick="confirmapproveApproval('{{ $user->uuid }}')" class="btn btn-danger btn-sm" title="Approve">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            Tidak ada data baru
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $users->links('pagination::simple-bootstrap-4') }}
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
        function confirmapproveApproval(uuid){
            Swal.fire({
                title: 'Apakah anda yakin ingin menyetujui data aproval ini?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    aproveApproval(uuid);
                } else if (result.isDenied) {
                    Swal.fire('Perubahan tidak disimpan', '', 'info')
                }
            });
        }

        function aproveApproval(uuid){
            $.ajax({
                type: "POST",
                url: "{{ route('admin.users.approval.approve') }}",
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'uuid': uuid
                },
                dataType: "Json",
                success: function (response) {
                    window.location.href = "{{ route('admin.users.approval') }}";
                }
            });
        }
    </script>
@endsection

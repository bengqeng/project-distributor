@extends('admin.master_admin')
@section('title', 'User Profile')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">User Detail</li>
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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src=" {{ ($user['gender'] ==  "laki-laki") ? url('vendor/img/avatar/avatar_male2.png') : url('vendor/img/avatar/avatar_woman2.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>

                        <h3 class="profile-username text-center"> {{ ucwords($user['full_name']) }} </h3>

                        <p class="text-muted text-center">{{ $user['account_type'] }}</p>
                        <p class="text-muted text-center">{{ ucwords($user['gender']) }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Order</b> <a class="float-right">-</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sales</b> <a class="float-right">-</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        Detail User
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['email']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['username']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['phone_number']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Status Register</label>
                                        <div class="col-sm-10">
                                            <span class="right badge badge-warning">{{$user['status_register']}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['birthday']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['nama_provinsi']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['nama_kabupaten']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['nama_kecamatan']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kelurahan</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {{$user['nama_kelurahan']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted">
                                                {!! nl2br($user['address']) !!}
                                            </p>
                                        </div>
                                    </div>
                                    @if ($user['status_register'] == 'hold')
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button onclick="confirmdeleteApproval('{{ $user['uuid'] }}')" type="button" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i> Hapus User</button>
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection

@section('js-script')
    <script>
        function confirmdeleteApproval(uuid){
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data aproval ini?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    deleteApproval(uuid);
                } else if (result.isDenied) {
                    Swal.fire('Perubahan tidak disimpan', '', 'info')
                }
            });
        }

        function deleteApproval(uuid){
            url = "{{ route('admin.users.approval.destroy', ':uuid') }}";
            url = url.replace(':uuid', uuid);

            $.ajax({
                type: "DELETE",
                url: url,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "Json",
                success: function (response, text, xhr) {
                    window.location.href = "{{ route('admin.users.approval') }}";
                },
                error: function (response){
                    // console.log(response.status);
                }
            });
        }
    </script>
@endsection

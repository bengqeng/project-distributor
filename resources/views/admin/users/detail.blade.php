@extends('admin.master_admin')
@section('title', 'Profil Anggota')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil Anggota</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Detail Anggota</li>
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
                        Detail Anggota
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            @if ($user['banned'] == 0)
                                @if ($user['status_register'] == 'rejected')
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-danger text-xl">
                                            <a href="{{ route('admin.users.rejected') }}">Ditolak</a>
                                        </div>
                                    </div>
                                @elseif ($user['status_register'] == 'approved')
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-success text-xl">
                                            <a href="{{ route('admin.users.aktif') }}">Disetujui</a>
                                        </div>
                                    </div>
                                @elseif ($user['status_register'] == 'hold')
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-warning text-xl">
                                            <a href="{{ route('admin.users.approval') }}">Ditunda</a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-warning text-xl">
                                        <a href="{{ route('admin.users.banned') }}">Diblokir</a>
                                    </div>
                                </div>
                            @endif

                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['email']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['username']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">No HP</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['phone_number']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Status Pendaftaran</label>
                                        <div class="col-sm-10">
                                            <span class="right badge badge-warning col-form-label">
                                                @if ($user['status_register'] == 'approved')
                                            <td>Disetujui</td>
                                            @elseif ($user['status_register'] == 'rejected')
                                            <td>Ditolak</td>
                                            @else
                                            <td>Tertunda</td>
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['birthday']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                <a href="{{ route('admin.users_by_region').'?kode_area='.$user['province_id'] }}">
                                                {{$user['nama_provinsi']}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['nama_kabupaten']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['nama_kecamatan']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kelurahan</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['nama_kelurahan']}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {!! nl2br($user['address']) !!}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Kode Referal</label>
                                        <div class="col-sm-10">
                                            <p class="text-muted col-form-label">
                                                {{$user['referral_id']}}
                                            </p>
                                        </div>
                                    </div>
                                    @if ($user['status_register'] == 'hold')
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button onclick="confirmdeleteApproval('{{ $user['uuid'] }}')" type="button" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i> Hapus Anggota</button>
                                            </div>
                                        </div>
                                    @elseif (($user['status_register'] == 'approved'))
                                        @if ($user['banned'] == false)
                                            <button type="button"  class="btn btn-primary" id="admin-reset-user-passsword" data="{{ $user['uuid'] }}">Reset User Password</button>
                                        @endif
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

<!-- Modal -->
<button type="button" hidden id="reset-user-password"  class="btn btn-primary" data-toggle="modal" data-target="#admin-reset-password">
    Reset Password
</button>

<div class="modal fade" id="admin-reset-password" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Password Baru Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="content-new-password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-script')

    <script>
        $('button#admin-reset-user-passsword').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin reset password anggota?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {

                if (result.isConfirmed) {
                    url = "{{route('admin.users.aktif.reset_password')}}"
                    $.ajax({
                        type: "post",
                        url: "{{route('admin.users.aktif.reset_password')}}",
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'uuid': this.getAttribute('data')
                        },
                        dataType: "JSON",
                        success: function (data, status, xhr) {
                            if(xhr.status == 201){
                                newPassword = data.message.new_password;
                                $('#admin-reset-password').find('#content-new-password').html(newPassword);
                                $('#reset-user-password').trigger('click');
                            }
                        }
                    });
                }
            });
        });

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

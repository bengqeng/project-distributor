@extends('admin.master_admin')
@section('title', 'Ubah Profil')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ubah Profil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Ubah Profil</li>
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
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{auth()->user()->gender ==  "laki-laki" ? url('vendor/img/avatar/avatar_male.png') : url('vendor/img/avatar/avatar_woman.png') }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->full_name }}</h3>

                        <p class="text-muted text-center">Administrator</p>

                        {{-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Order</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sales</b> <a class="float-right">543</a>
                            </li>
                        </ul> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        Pengaturan
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="settings">
                                <form action="{{route('profile.update', $user->uuid)}}" method="post"
                                    enctype="multipart/form-data" id="form-edit">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="uuid" value="{{ $user->uuid }}" id="id-data">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="name" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                                                value="{{ $user->full_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" id="pass" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Konfirmasi Passowrd</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password_confirmation" onkeyup="chkpwd()"
                                                id="confirm-pass" class="form-control">
                                            <span id="mess"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <a href="{{route('profile.index')}}" type="submit"
                                                class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary btn-test">Simpan</button>
                                        </div>
                                    </div>
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

    var chkpwd = function (){
        if(document.getElementById('pass').value == document.getElementById('confirm-pass').value)
        {
            document.getElementById('mess').innerHTML = '';
        }
        else
        {
            document.getElementById('mess').innerHTML = 'Password tidak sesuai';
            document.getElementById('mess').style.color='red';
        }
    }

</script>
@endsection

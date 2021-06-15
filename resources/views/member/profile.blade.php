@extends('member.master_member')
@section('title', 'Profile')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Member</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src=" {{auth()->user()->gender ==  "laki-laki" ? url('vendor/img/avatar/avatar_male.png') : url('vendor/img/avatar/avatar_woman.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <h3 class="profile-username text-center">{{ $user->full_name}}</h3>
                        <p class="text-muted text-center">{{ $user['account_type'] }}</p>
                        <p class="text-muted text-center">{{ $user['gender'] }}</p>
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

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Tentang Saya</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fa fa-phone" aria-hidden="true"></i> No Telephone</strong>
                        <p class="text-muted">
                            {{ $user->phone_number }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-envelope" aria-hidden="true"></i></i> Email</strong>
                        <p class="text-muted">
                            {{ $user->email }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-id-card" aria-hidden="true"></i> Id Akun</strong>
                        <p class="text-muted">
                            {{ $user->username }}
                        </p>

                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                        <p class="text-muted">{!! $user->address !!}</p>

                        <hr>
                        <button type="button" class="btn btn-warning">Edit</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings"
                                    data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience"
                                                placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">SImpan Edit</button>
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
</section>
<!-- /.content -->
@endsection

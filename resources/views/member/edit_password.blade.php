@extends('member.master_member')
@section('title', 'Profile')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Member</li>
                    <li class="breadcrumb-item active">Profil</li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('member.save.edit_password', $user->uuid) }}" id="member-form-edit-password">
                            @csrf
                            <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-6">
                                    @if($errors->has('old_password'))
                                        <div class="reject_validation">{{ $errors->first('old_password') }}</div>
                                    @endif
                                    <input type="password" class="form-control" name="old_password" placeholder="Password Lama" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-6">
                                    @if($errors->has('new_password'))
                                        <div class="reject_validation">{{ $errors->first('new_password') }}</div>
                                    @endif
                                    <input type="password" class="form-control" name="new_password" placeholder="Password Baru" minlength="5" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                                <div class="col-sm-6">
                                    @if($errors->has('new_password_confirmation'))
                                        <div class="reject_validation">{{ $errors->first('new_password_confirmation') }}</div>
                                    @endif
                                    <input type="password" class="form-control" name="new_password_confirmation" minlength="5" placeholder="Ketik Kembali Password Baru" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button class="btn float-left btn-sm btn-warning" type="submit">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Simpan
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
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

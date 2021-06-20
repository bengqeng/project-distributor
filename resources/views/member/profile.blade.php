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
                        <h3 class="profile-username text-center">{{ $user->full_name }}</h3>
                        <p class="text-muted text-center">{{ $user['account_type'] }}</p>
                        <p class="text-muted text-center">{{ $user['gender'] }}</p>
                        <p class="text-muted text-center">{{ $user['birthday'] }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Kode Referral</b> <a class="float-right">{{$user->referral_id}}</a>
                            </li>
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
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings"
                                    data-toggle="tab">Edit Profile</a></li>
                        </ul>
                    </div><!-- /.card-header -->

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form method="POST" action="{{ route('member.update', $user->uuid) }}" class="form-member-edit">
                                    @csrf
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 left-box">
                                            <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pr-md-2 left-content">

                                                <div class="form-group">
                                                    @if($errors->has('full_name'))
                                                        <div class="reject_validation">{{ $errors->first('full_name') }}</div>
                                                    @endif

                                                    <input type="text" name="full_name" id="full_name" class="form-control left-box-content"
                                                        placeholder="Nama Lengkap" value="{{ $user->full_name }}">
                                                    <span class="edit-profile-tooltip">Nama Lengkap</span>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6 m-0">
                                                        @if($errors->has('birth_place'))
                                                            <div class="reject_validation">{{ $errors->first('birth_place') }}</div>
                                                        @endif

                                                        <input type="text" name="birth_place" id="birth_place" class="form-control left-box-content"
                                                            placeholder="Tempat Lahir" value="{{ $user->birth_place}}">
                                                        <span class="edit-profile-tooltip">Tempat Lahir</span>
                                                    </div>

                                                    <div class="form-group col-md-6 m-0">
                                                        @if($errors->has('birthday'))
                                                            <div class="reject_validation">{{ $errors->first('birthday') }}</div>
                                                        @endif

                                                        <input type="date" name="birthday" id="birthday" class="form-control left-box-content"
                                                            placeholder="Tanggal Lahir" value="{{ $user->birthday }}">
                                                        <span class="edit-profile-tooltip">Tanggal Lahir</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @if($errors->has('gender'))
                                                        <div class="reject_validation">{{ $errors->first('gender') }}</div>
                                                    @endif

                                                    <select name="gender" id="gender" class="form-control left-box-content" >
                                                        <option value="" class="text-disabled">Jenis Kelamin</option>
                                                        <option value="laki-laki" {{ $user->gender == "laki-laki" ? "selected" : "" }} > Laki-laki</option>
                                                        <option value="perempuan" {{ $user->gender == "perempuan" ? "selected" : "" }} >Perempuan</option>
                                                    </select>
                                                    <span class="edit-profile-tooltip">Jenis Kelamin</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('email'))
                                                        <div class="reject_validation">{{ $errors->first('email') }}</div>
                                                    @endif

                                                    <input type="email" name="email" id="email" class="form-control left-box-content"
                                                        placeholder="Email" value="{{ $user->email }}">
                                                    <span class="edit-profile-tooltip">Email</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('phone_number'))
                                                        <div class="reject_validation">{{ $errors->first('phone_number') }}</div>
                                                    @endif

                                                    <input type="text" name="phone_number" id="phone_number" min="0" class="form-control left-box-content"
                                                        placeholder="Nomor HP/WhatsApp" value="{{ $user->phone_number }}">
                                                    <span class="edit-profile-tooltip">Nomor Telephone</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 right-box">
                                            <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pl-md-2">
                                                <div class="form-group">
                                                    @if($errors->has('provinsi'))
                                                        <div class="reject_validation">{{ $errors->first('provinsi') }}</div>
                                                    @endif

                                                    <select name="provinsi" id="provinsi" class="form-control">
                                                        <option value="">Pilih Provinsi</option>

                                                        @foreach ($provinsis as $p)
                                                            <option value="{{$p->id_prov}}" {{ $user->province_id == $p->id_prov ? "selected" : ""}}> {{$p->nama}} </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="edit-profile-tooltip">Provinsi</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('city'))
                                                        <div class="reject_validation">{{ $errors->first('city') }}</div>
                                                    @endif

                                                    <button class="form-control sr-only" id="loading-kabupaten" disabled>
                                                        <i class="fa fa-spinner fa-spin"></i> Loading Kota
                                                    </button>

                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">Pilih Kota atau Kabupaten</option>
                                                        @foreach ($kabupatens as $kab)
                                                            <option value="{{$kab->id_kab}}" {{ $user->city_id == $kab->id_kab ? "selected" : ""}}> {{$kab->nama}} </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="edit-profile-tooltip">Kabupaten</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('kecamatan'))
                                                        <div class="reject_validation">{{ $errors->first('kecamatan') }}</div>
                                                    @endif

                                                    <button class="form-control sr-only" id="loading-kecamatan" disabled>
                                                        <i class="fa fa-spinner fa-spin"></i> Loading Kecamatan
                                                    </button>

                                                    <select name="kecamatan" id="kecamatan" class="form-control" >
                                                        <option value="">Pilih Kecamatan</option>

                                                        @foreach ($kecamatans as $kec)
                                                            <option value="{{ $kec->id_kec}}" {{ $user->kecamatan_id == $kec->id_kec ? "selected" : ""}}> {{ $kec->nama }} </option>
                                                        @endforeach

                                                    </select>
                                                    <span class="edit-profile-tooltip">Kecamatan</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('kelurahan'))
                                                        <div class="reject_validation">{{ $errors->first('kelurahan') }}</div>
                                                    @endif

                                                    <button class="form-control sr-only" id="loading-kelurahan" disabled>
                                                        <i class="fa fa-spinner fa-spin"></i> Loading Kelurahan
                                                    </button>

                                                    <select name="kelurahan" id="kelurahan" class="form-control" >
                                                        <option value="">Pilih Kelurahan</option>
                                                        @foreach ($kelurahans as $kel)
                                                            <option value="{{$kel->id_kel}}" {{ $user->kelurahan_id == $kel->id_kel ? "selected" : ""}}>{{$kel->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="edit-profile-tooltip">Kelurahan</span>
                                                </div>

                                                <div class="form-group">
                                                    @if($errors->has('address'))
                                                        <div class="reject_validation">{{ $errors->first('address') }}</div>
                                                    @endif

                                                    <textarea name="address" id="address" class="form-control" placeholder="Alamat">{!! $user->address !!}</textarea>
                                                    <span class="edit-profile-tooltip">Alamat</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="container register-foot pb-sm-5 px-sm-5 form-button-edit-profile">
                                        <a href="{{ route('member.show', $user->uuid) }}" class="btn float-left btn-sm btn-danger" type="button">
                                            <i class="fa fa-times" aria-hidden="true"></i> Batal Edit
                                        </a>

                                        <button class="btn float-right btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit" aria-hidden="true"></i> Simpan
                                        </button>

                                        <a class="btn float-right btn-sm btn-info" href="{{ route('member.edit_password', $user->uuid) }}">
                                            <i class="fas fa-user-secret" aria-hidden="true"></i> Ganti Password
                                        </a>
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

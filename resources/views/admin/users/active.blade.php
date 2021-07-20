@extends('admin.master_admin')
@section('title', 'Anggota')

@section('main-content')
  <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-6">
            <h1 class="m-0">Anggota</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
            <li class="breadcrumb-item active">Anggota</li>
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
                        <h3 class="card-title">Daftar Anggota Aktif</h3>
                    </div>

                    <div class="card-body">
                        <form class="form-inline" method="GET" action="{{ route('admin.users.aktif') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="sr-only">Nama Lengkap</label>
                                <input name="full_name" type="full_name" class="form-control" placeholder="Nama" value="{{ $fullName }}">
                            </div>
                            <div class="form-group mx-sm-1 mb-2">
                                <select class="form-control" name="account_type">
                                    <option value="">-- Tipe Akun --</option>
                                    <option value="agent" {{ $accountType == 'agent' ? "selected" : "" }}>Agent</option>
                                    <option value="distributor" {{ $accountType == 'distributor' ? "selected" : "" }}>Distributor</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-1 mb-2">
                                <select class="form-control" name="kode_area">
                                    <option value="">-- Provinsi --</option>
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



                        <table class="table table-bordered table-hover" id="table-users-all">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tipe Akun</th>
                                    <th>Provinsi</th>
                                    <th>Id Akun</th>
                                    <th>Status Anggota</th>
                                    <th style="width: 200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="{{ route('admin.users.aktif.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                            <td>{{ $user->account_type }}</td>
                                            <td>
                                                <a href="{{ route('admin.users_by_region').'?kode_area='.$user->province_id.'&status_register=approved' }}">
                                                    {{ $user->nama_provinsi }}
                                                </a>
                                            </td>
                                            <td>{{ $user->username  }}</td>
                                            <td class="text-center">
                                                @if ($user->status_register == 'approved')
                                                    <span class="right badge badge-success">Disetujui</span>
                                                @elseif ($user->status_register == 'rejected')
                                                    <span class="right badge badge-danger">Ditolak</span>
                                                @elseif ($user->status_register == 'hold')
                                                    <span class="right badge badge-warning">Tertunda</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (Auth::user()->can('can ban user'))
                                                    <button type="button" class="btn btn-danger btn-sm" title="Ban User" id="btn-submit" value="Ban User" onclick="confirmBanUser(this)"> Blokir</button>
                                                    <form action="{{ route('admin.users.aktif.ban', $user->uuid) }}" method="POST" id="form-ban-user" class="sr-only">
                                                        @csrf
                                                        <input type="hidden" name="confirmation" value="yes">
                                                        <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">Data Kosong</td>
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
    <script>
        function confirmBanUser(obj){
            Swal.fire({
                title: 'Apakah anda ingin melakukan blokir terhadap akun anggota tersebut?',
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

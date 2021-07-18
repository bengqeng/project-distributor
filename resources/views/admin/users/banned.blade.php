@extends('admin.master_admin')
@section('title', 'Anggota Diblokir')
@section('main-content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Diblokir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Anggota</li>
                    <li class="breadcrumb-item active">Diblokir</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Anggota Diblokir</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" method="GET" action="{{ route('admin.users.banned') }}">
                            @csrf
                            <div class="form-group mx-sm-1 mb-2">
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
                            <div class="form-group mx-sm-3 mb-2">
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

                        <table class="table table-bordered" id="table-users-banned">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tipe Akun</th>
                                    <th>Provinsi</th>
                                    <th>Id Akun</th>
                                    <th>Status Anggota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td><a href="{{ route('admin.users.rejected.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                            <td>{{ $user->account_type }}</td>
                                            <td>{{ $user->nama_provinsi }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->status_register }}</td>
                                            <td>
                                                @if (Auth::user()->can('can unban user'))
                                                    <button type="submit" class="btn btn-warning btn-sm" title="Ban User" onclick="confirmOpenBanUser(this)" id="btn-submit-open-ban" value="Open Ban User">Buka Blokir</button>
                                                    <form action="{{ route('admin.users.open_banned', $user->uuid) }}" method="POST" id="form-open-ban-user" class="sr-only">
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
                                        <td colspan="6">Data Kosong</td>
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
    function confirmOpenBanUser(obj) {
        Swal.fire({
            title: 'Apakah anda ingin membuka blokir terhadap akun anggota ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Ya`,
            denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(obj).parent().find('form').submit();
                }
        });
    }
</script>
@endsection

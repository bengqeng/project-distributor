@extends('admin.master_admin')

@section('title', 'Dasboard')

@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dasboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Dasboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content" id="index">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box" id="card-preview">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-boxes"></i></span>

                    <div class="info-box-content" onclick="window.location.href='{{ route('product.index') }}'">
                        <span class="info-box-text">Produk</span>
                        <span class="info-box-number"> {{$product->count()}} </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3" id="card-preview">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number"> 0 </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3" id="card-preview">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content" onclick="window.location.href='{{ route('admin.users.aktif') }}'">
                        <span class="info-box-text">Jumlah Anggota</span>
                        <span class="info-box-number">{{ $totalActiveUser}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3" id="card-preview">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>

                    <div class="info-box-content" onclick="window.location.href='{{ route('admin.users.rejected') }}'">
                        <span class="info-box-text">Ditolak</span>
                        <span class="info-box-number"> {{ $totalDeletedUser }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Anggota tiap Provinsi</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="container" id="usersByRegion">
                            <div class="overlay-wrapper" id="usersByRegion-log-loader">
                                <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Memuat...</div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aktivitas Anggota</h3>
                    </div>
                    <div class="card-body">
                        <div class="overlay-wrapper" id="activity-log-loader">
                            <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Memuat...</div></div>
                        </div>
                        <table class="table table-bordered table-hover" id="activity-log-table">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Waktu</th>
                                    <th>Jenis Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="activity-log-table-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js-script')
  <script>
    $(document).ready(function() {
        loadLogActivity();
        usersByRegion();
    });

    function usersByRegion(){
        $.ajax({
            type: "GET",
            url: "{{ route('admin.homepage_users_by_region') }}",
            data: [],
            dataType: "html",
            success: function (response) {
                $('#usersByRegion').html(response);
            },
            complete: function (e){
                $('#usersByRegion-log-loader').addClass('sr-only');
            }
        });
    }

    function loadLogActivity(){
        $.ajax({
            type: "GET",
            url: "{{ route('admin.log_activity_user') }}",
            data: [],
            dataType: "html",
            success: function (response) {
                $('#activity-log-table-body').html(response);
            },
            complete: function (e){
                $('#activity-log-loader').addClass('sr-only');
            }
        });
    }
  </script>
@endsection

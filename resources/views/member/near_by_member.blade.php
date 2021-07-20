@extends('member.master_member')
@section('title', 'Member Terdekat')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1 class="m-0">Member Sekitar</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Member</li>
                    <li class="breadcrumb-item active">Member Sekitar</li>
                </ol>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @if ($nearbymembers->count() > 0)
                    @foreach ($nearbymembers as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                {{ $user->account_type }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $user->full_name}}</b></h2>
                                            <p class="text-muted text-sm"><b>Email: </b> {{ $user->email }} </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat:
                                                    {!! $user->address !!}
                                                </li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No HP: {{ $user->phone_number }}</li>
                                            </ul>
                                        </div>

                                        <div class="col-5 text-center">
                                            <img src="/vendor/img/member/user2-160x160.jpg" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        Tidak ada data member terdekat.
                    </div>
                @endif


            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                {{ $nearbymembers->links('pagination::simple-bootstrap-4') }}
            </nav>
        </div>

    </div>

</section>

@endsection

@section('js-script')

@endsection

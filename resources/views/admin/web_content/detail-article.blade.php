@extends('admin.master_admin')
@section('title', 'Detail Article')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Detail Article</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

<div class="container">
    <div>{{ $article->author }}</div>
    <div>{{ $article->updated_at->diffForHumans() }} </div>


</div>
<div> {!! $article->body_article !!} </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
@section('js-script')
@endsection

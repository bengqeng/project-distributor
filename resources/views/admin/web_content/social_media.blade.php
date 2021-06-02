@extends('admin.master_admin')
@section('title', 'Social Media')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Social Media</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Social Media</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@elseif (session('status2'))
<div class="alert alert-danger">
    {{ session('status2') }}
</div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Media</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fas fa-plus"></i> Add New
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Social Media</th>
                                    <th>Link</th>
                                    <th>Link Share</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social_media as $social_media)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$social_media->media_type}}</td>
                                    <td>{{$social_media->url}}</td>
                                    <td>{{$social_media->url_share}}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" title="Edit"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/webcontent/social/{{$social_media->id}}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
@section('modal')
<div class="modal hide fade in" data-backdrop="static" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

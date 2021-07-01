@extends('admin.master_admin')
@section('title', 'Sosial Media')

@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sosial Media</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Sosial Media</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid" id="social-media">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sosial Media <i>Footer</i></h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                @if(count($social) < 4)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fas fa-plus"></i> Tambah Baru
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="social-media-footer" class="table">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Sosial Media</th>
                                    <th>URL</th>
                                    <th style="width: 130px">Tampilkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social as $no => $footer)
                                <tr>
                                    <td>{{$footer->media_type}}</td>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-md-11">
                                                <input type="text" value="{{$footer->url}}" name="url" class="form-control social-media-footer">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-warning" id="update-social-media-footer" data="{{ $footer->id }}"><i class="fas fa-save" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" {{ $footer->show ? "checked" : "" }} class="custom-control-input" id="customSwitch_{{$footer->id}}" onchange="enableSocialMedia(this, '{{ $footer->id }}')">
                                                <label class="custom-control-label" for="customSwitch_{{$footer->id}}"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
    function enableSocialMedia(obj, id){
        url = "{{route('social.enable_view', ':socialMedia')}}";
        url = url.replace(':socialMedia', id);

        $.ajax({
            type: "POST",
            url: url,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'show': obj.checked
            },
            dataType: "Json",
            success: function (response) {
                Swal.fire(response.message, '', 'info')
            }
        });
    }

    $('button#update-social-media-footer').click(function (e) {
        e.preventDefault();
        url = "{{route('social.update_url', ':socialMedia')}}";
        url = url.replace(':socialMedia', $(this).attr('data'));
        $('button#update-social-media-footer').attr('disabled' , true);

        $.ajax({
            type: "POST",
            url: url,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'url': $(this).parent().parent().find("input").val()
            },
            dataType: "Json",
            success: function (response) {
                if(response.status == "success"){
                    Swal.fire(response.message, '', 'info')
                }else{
                    Swal.fire(response.message, '', 'error')
                }

                $('button#update-social-media-footer').removeAttr('disabled');
            }
        });
    });

</script>
@endsection
